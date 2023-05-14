<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Product\ProductColumns;
use App\Models\Product\ProductsDescription;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    const BLACK_LIST = [];


    public function __construct()
    {
        View::share('global_columns', ProductColumns::column_meta_sort_single());
        View::share('global_langs', Language::all());
    }


    public function updateLangs(Request $request, $item_id, $save_model, $item_foreign_key, $language_foreign_key = 'language_id')
    {
        if ($request->has('langs')){
            $langs = $request->input('langs');
            if (is_array($langs)){
                foreach ($langs as $language_id => $lang){
                    $res = $save_model::where($item_foreign_key, $item_id)->where($language_foreign_key, $language_id)->first();
                    if ($res){
                        $res->update($lang);
                    }else{
                        $lang[$item_foreign_key] = $item_id;
                        $lang[$language_foreign_key] = $language_id;

                        $save_model::create($lang);
                    }
                }
            }
        }
    }
    /**
     * @param string $model
     * @return array|int[]|string[]
     * Возвращает масив полей модели
     * @deprecated
     */
    public function getFieldsModel(string $model)
    {
        // firstOrNew будет запрашивать с использованием атрибутов, поэтому нет необходимости в двух запросах.
        $item = $model::firstOrNew();

        // если была найдена существующая запись
        if ($item->exists) {
            $columns = array_keys($item->attributesToArray());
        } // в противном случае был создан новый экземпляр модели
        else {
            // получить имена столбцов для таблицы
            $columns = Schema::getColumnListing($item->getTable());
        }

        return $columns;
    }

    public function save_img(Request $request, $field_name, $path = '', $disk = 'public')
    {
        if ($request->has($field_name) and $request->file($field_name)) {
            $subdir = substr(md5(microtime()), mt_rand(0, 30), 2) . '/' . substr(md5(microtime()), mt_rand(0, 30), 2);
            return $request->file($field_name)->store("uploads/$subdir/" . $path, $disk);
        }

        return false;
    }

    /**
     * @param Request $request
     * @param string $path_save_img
     * @return array
     * Возвращает базовый для всех таблиц заполненный масив полей
     * и сохраняет изображения если они были переданы.
     */
    public function base_fields(Request $request, string $path_save_img = '')
    {
        if ($path_save_img) {
            $path_img_announce = $this->save_img($request, 'img_announce', $path_save_img);
            $path_img_detail = $this->save_img($request, 'img_detail', $path_save_img);
        }

        /*
         * Обязательные поля для всех публичных страниц
         */
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'announce' => $request->announce,
            'description' => $request->description,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'name_lavel' => $request->name_lavel,
        ];

        if ($path_save_img) {
            $data['img_announce'] = $path_img_announce;
            $data['img_detail'] = $path_img_detail;
        }

        if ($request->has('parent_id')) {
            $data['parent_id'] = $request->input('parent_id');
        }
        if ($request->has('hit')) {
            $data['hit'] = $request->input('hit');
        }
        if ($request->has('is_download')) {
            $data['is_download'] = $request->input('is_download');
        }
        if ($request->has('is_show')) {
            $data['is_show'] = $request->input('is_show');
        }
        if ($request->has('min_quantity')) {
            $data['min_quantity'] = $request->input('min_quantity');
        }
        if ($request->has('quantity')) {
            $data['quantity'] = $request->input('quantity');
        }
        if ($request->has('sort')) {
            $data['sort'] = $request->input('sort');
        }
        if ($request->has('price')) {
            $data['price'] = $request->input('price');
        }
        if ($request->has('old_price')) {
            $data['old_price'] = $request->input('old_price');
        }
        if ($request->has('width')) {
            $data['width'] = $request->input('width');
        }
        if ($request->has('height')) {
            $data['height'] = $request->input('height');
        }
        if ($request->has('length')) {
            $data['length'] = $request->input('length');
        }
        if ($request->has('weight')) {
            $data['weight'] = $request->input('weight');
        }
        if ($request->has('sku')) {
            $data['sku'] = $request->input('sku');
        }
        if ($request->has('upc')) {
            $data['upc'] = $request->input('upc');
        }
        if ($request->has('ean')) {
            $data['ean'] = $request->input('ean');
        }
        if ($request->has('jan')) {
            $data['jan'] = $request->input('jan');
        }
        if ($request->has('isbn')) {
            $data['isbn'] = $request->input('isbn');
        }
        if ($request->has('mpn')) {
            $data['mpn'] = $request->input('mpn');
        }

        return $data;
    }


    /**
     * @param Request $request
     * @return void
     * Обновить сортировку полей.
     */
    protected function updateSort(Request $request, string $model)
    {
        $fields = $request->all();

        if (array_key_exists('langs', $fields) and is_array($fields['langs']) and count($fields['langs']) > 0){
            foreach ($fields['langs'] as $lang){
                foreach ($lang as $key => $value){
                    $fields[$key] = $value;
                }
                break;
            }
            unset($fields['langs']);
        }
//                dd($fields);
        $sort = 0;
        foreach ($fields as $field => $value) {
            if (!in_array($field, self::BLACK_LIST) and !str_starts_with($field, '_')) {
                $sort += 10;
                $model::where('origin_name', $field)->update(['sort_single' => $sort]);
            }
        }
    }

    /**
     * @param Request $request
     * @param $item_name_for_route
     * @param $item_id
     * @return \Illuminate\Http\RedirectResponse|void
     * При правильном определении кнопок отправки формы в рамках админки
     * перенаправляет на соответствующий маршрут в конце действия в контроллере.
     */
    protected function redirectAdmin(Request $request, $item_name_for_route, $item_id)
    {
        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.' . $item_name_for_route . '.edit', ['id' => $item_id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.' . $item_name_for_route);
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.' . $item_name_for_route . '.create');
        }
    }


    /**
     * @param Request $request
     * @param $request_field
     * @param $foreign_key
     * @param $item_id
     * @param string $model
     * @return void
     * Сохраняет масив изображений
     */
    protected function saveGallary(Request $request, $request_field, $foreign_key, $item_id, string $model)
    {
        if ($request->has($request_field) and is_array($request->file($request_field))) {
            $sort = 0;
            foreach ($request->file($request_field) as $img) {
                $model::create([
                    $foreign_key => $item_id,
                    'sort' => $sort += 10,
                    'src' => $img->store('uploads/' . $foreign_key . '/' . $item_id, 'public')
                ]);
            }
        }
    }


    protected function deleteGallery(Request $request, $request_field, string $model)
    {
        if ($request->has($request_field) and $request->input($request_field)) {
            $model::whereIn('src', $request->input($request_field))->delete();
            foreach ($request->input($request_field) as $path) {
                if (file_exists(base_path('public/storage/' . $path))) {
                    unlink(base_path('public/storage/' . $path));
                }
            }
        }
    }


    public function updateOptions(Request $request, $item_id, string $model_option, string $model_value)
    {
        if ($request->has('options')) {
            $options = $request->input('options');

            foreach ($options as $option_id => $option) {
                // Если опция не указана удаляем её вместе со значениями
                if (!isset($option['name'])){
                    $model_option::where('id', $option_id)->delete();
                }else{
                    if (str_starts_with($option_id, 'new_')) {
                        $option_id = 0;
                    }
                    $opt = $model_option::where('id', $option_id)->first();
                    if ($opt){
                        $opt->update(['name' => $option['name']]);
                    }else{
                        $opt = $model_option::create(['name' => $option['name'], 'product_id' => $item_id]);
                        $option_id = $opt->id;
                    }
                }

                if (isset($option['values'])) {
                    foreach ($option['values'] as $value_id => $value) {
                        // Если значение не указано удаляем его
                        if (!isset($value['name'])){
                            $model_value::where('id', $value_id)->delete();
                        }else{
                            if (str_starts_with($value_id, 'new_')) {
                                $value_id = 0;
                            }
                            $val = $model_value::where('id', $value_id)->first();
                            if ($val){
                                $val->update(['name' => $value['name']]);
                            }else{
                                $model_value::create(['name' => $value['name'], 'option_id' => $option_id]);
                            }
                        }
                    }
                }
            }
        }
    }


    protected function updateProperties(Request $request, string $model)
    {
        if ($request->has('properties')) {
            $properties = $request->input('properties');

            foreach ($properties as $id => $property) {
                if (isset($property['delete_property'])) {
                    $model::where('id', $id)->delete();
                } else {
                    // все поля свойств должны быть заполнены
                    foreach ($property as $value) {
                        if (is_null($value)) {
                            return false;
                        }
                    }
                    if (str_starts_with($id, 'new_')) {
                        $id = 0;
                    }
                    $prop = $model::where('id', $id)->first();
                    if ($prop) {
                        $prop->update($property);
                    } else {
                        $model::create($property);
                    }
                }
            }
        }
    }

    protected function updateAdditionalFields(Request $request, $foreign_key, $id, $model){
        if ($request->has('additional_fields')) {
            $additional_fields = $request->input('additional_fields');

            foreach ($additional_fields as $id_field => $field){
                $field[$foreign_key] = $id;
                if (str_starts_with($id_field, 'new_')){
                    $model::create($field);
                }else{
                    $f = $model::where('id', $id_field)->first();
                    if (isset($field['delete_additional_field'])){
                        $f->delete();
                    }else{
                        $f->update($field);
                    }
                }

            }
        }
    }

    protected function updateAdditionalFields2(Request $request, $foreign_key, $item_id, $model)
    {
        if ($request->has('additional_fields')) {
            $data_delete_additional_fields = $request->input('additional_fields');
            dd($data_delete_additional_fields);
            foreach ($data_delete_additional_fields as $field => $property) {
                if (isset($data_delete_additional_fields['delete_additional_field']) and count($data_delete_additional_fields['delete_additional_field']) > 0) {
                    foreach ($data_delete_additional_fields['delete_additional_field'] as $index) {
                        if ($field != 'delete_additional_field') {
                            unset($data_delete_additional_fields[$field][$index]);
                        }

                    }
                }
            }
            unset($data_delete_additional_fields['delete_additional_field']);

            $new_props = [];
            foreach ($data_delete_additional_fields['key'] as $key => $value) {
                $new_props[] = [
                    $foreign_key => $item_id,
                    'name' => $data_delete_additional_fields['name'][$key],
                    'type' => $data_delete_additional_fields['type'][$key],
                    'key' => $data_delete_additional_fields['key'][$key],
                    'value' => $data_delete_additional_fields['value'][$key],
                ];
            }

            DB::transaction(function () use ($foreign_key, $item_id, $new_props, $model) {
                $model::where($foreign_key, $item_id)->delete();
                $model::insert($new_props);
            });

        }
    }
}
