<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\AdminController;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback\Feedback;
use App\Models\Feedback\FeedbackColumns;
use App\Models\Feedback\FeedbackTabs;

class FeedbackAdminController extends AdminController
{
    const IMAGE_PATH = 'feedback';


    public function index()
    {
        return view('admin.feedback.index', [
            'columns' => FeedbackColumns::column_meta_sort_list(),
            'items' => Feedback::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.feedback.create', [
            'columns' => FeedbackColumns::column_meta_sort_single(),
            'existing_fields' => $this->getFieldsModel(Feedback::class),
        ]);
    }


    public function store(StoreFeedbackRequest $request)
    {
        $feedback = Feedback::create($this->base_fields($request, self::IMAGE_PATH));

        return $this->redirectAdmin($request, 'feedback', $feedback->id);
    }


    public function edit($id)
    {
        return view('admin.feedback.edit', [
            'item' => Feedback::where('id', $id)->firstOrFail(),
            'existing_fields' => $this->getFieldsModel(Feedback::class),
            'tabs' => FeedbackTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => FeedbackColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateFeedbackRequest $request, $id)
    {
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, FeedbackColumns::class);

        /*
         * Работа с сообщением
         */
        $category = Feedback::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        if (array_key_exists('img_announce', $data) and is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (array_key_exists('img_detail', $data) and is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }

        if ($request->has('delete_img_announce')) {
            if (file_exists('storage/' . $category->img_announce)) {
                unlink('storage/' . $category->img_announce);
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists('storage/' . $category->img_detail)) {
                unlink('storage/' . $category->img_detail);
            }
            $data['img_detail'] = '';
        }

        $category->update($data);

        /*
         * Перенаправляем взависимости от нажатой кнопки
         */
        return $this->redirectAdmin($request, 'feedback', $id);
    }


    public function destroy($id)
    {
        Feedback::destroy($id);

        return back();
    }
}
