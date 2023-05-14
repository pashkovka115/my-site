<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\AdminController;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Language;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Property;
use App\Models\Product\Attributes\Value;
use App\Models\Product\Product;
use App\Models\Product\ProductAdditionalFields;
use App\Models\Product\ProductColumns;
use App\Models\Product\ProductImages;
use App\Models\Product\ProductsDescription;
use App\Models\Product\ProductTabs;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Builder;
use Route;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAdminController extends AdminController
{
    const IMAGE_PATH = 'products';


    public function index()
    {
//        $lang = Language::where('base', true)->first();
//        $query->where('products_description.language_id', $lang->id);

        /*$products = Product::with(['langs' => function(HasMany $query){
            $lang = Language::where('base', true)->first();
            $query->where('language_id', $lang->id);
        }])->paginate();*/

        $products = Product::with('baseLang')->paginate();

//        dump($products);

        return view('admin.product.index', [
            'tabs' => ProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => ProductColumns::column_meta_sort_list(),
            'items' => $products,
        ]);
    }


    public function create()
    {
        return view('admin.product.create', [
            'columns' => ProductColumns::column_meta_sort_single(),
            // Наследуемые объекты
            'items' => Product::with('baseLang')->whereNull('parent_id')->get(),
            'items_with_children' => CategoryProduct::with('children')->whereNull('parent_id')->get(),
            //'existing_fields' => $this->getFieldsModel(Product::class),
//            'excluded_fields' => ['additional_fields']
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $data = $this->base_fields($request, self::IMAGE_PATH);
        $data['category_id'] = $request['category_id'];
        $product = Product::create($data);

        return $this->redirectAdmin($request, 'product', $product->id);
    }


    public function edit($id)
    {
        $product = Product::with([
            'additionalFields',
            'properties',
            'options',
            'gallery',
            'langs'
        ])->where('id', $id)->firstOrFail();
//        dd($product);

        $columns = $global_columns = ProductColumns::column_meta_sort_single();
        // Расшариваем для всех чтобы было видно при глубокой вложенности шаблонов
        /*View::share('global_columns', $global_columns);
        View::share('global_langs', Language::all()); //- для старых шаблонов*/

        return view('admin.product.edit', [
            // редактируемый объект
            'item' => $product,
            // Наследуемые объекты
            'items' => Product::with('baseLang')->whereNull('parent_id')->whereNot('id', $id)->get(),
            // Категории
            'items_with_children' => CategoryProduct::with('children')
                ->whereNull('parent_id')
                ->get(),
            // Вкладки
            'tabs' => ProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            // Колонки(поля)
            'columns' => $columns,
        ]);
    }


    public function update(UpdateProductRequest $request, $id)
//    public function update(Request $request, $id)
    {
//        $request->dd();
        /*
         * Работа с мультиязычностью
         */
        $this->updateLangs($request, $id, ProductsDescription::class, 'product_id');
        /*
         * Работа с опциями
         */
        $this->updateOptions($request, $id, Option::class, Value::class);
        /*
         * Работа со свойствами
         */
        $this->updateProperties($request, Property::class);
        /*
         * Удаляем изображения из галереи
         */
        $this->deleteGallery($request, 'delete_gallery', ProductImages::class);
        /*
         * Сохраняем галерею
         */
        $this->saveGallary($request, 'img_gallery', 'product_id', $id, ProductImages::class);
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, ProductColumns::class);

        /*
         * Работа с дополнительными полями
         */
        $this->updateAdditionalFields($request, 'product_id', $id, ProductAdditionalFields::class);

        /*
         * Работа с товаром
         */
        $product = Product::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        if ($request->has('category_id')) {
            $data['category_id'] = $request->input('category_id');
        }

        if (is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }

        if ($request->has('delete_img_announce')) {
            if (file_exists(base_path('public/storage/' . $product->img_announce))) {
                unlink(base_path('public/storage/' . $product->img_announce));
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists(base_path('public/storage/' . $product->img_detail))) {
                unlink(base_path('public/storage/' . $product->img_detail));
            }
            $data['img_detail'] = '';
        }

        $product->update($data);

        return $this->redirectAdmin($request, 'product', $id);
    }


    public function destroy($id)
    {
        Product::destroy($id);

        return back();
    }
}
