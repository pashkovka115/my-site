<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends AdminController
{
    const IMAGE_PATH = 'users';

    /**
     * Список пользователей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.user.index', [
            'items' => User::all(),
        ]);
    }

    /**
     * Форма добавления полбзователя
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Сохранение пользователя
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'avatar' => ['nullable|image']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.user.edit', ['id' => $user->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.user');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.user.create');
        }
    }

    /**
     * Редактирование пользователя
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        return view('admin.user.edit', [
            'item' => User::where('id', $id)->firstOrFail(),
        ]);
    }

    /**
     * Обновление пользователя
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required','string'],
            'email' => ['required', 'email'],
            'new_email' => ['nullable', 'email'],
            'password_old' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'avatar' => ['nullable', 'image', 'max:10240', 'dimensions:max_width=500,max_height=700'],
        ]);

        // Check email
        $user = User::where('email', $data['email'])->firstOrFail();

        if ($data['password']){

            $data['password'] = Hash::make($data['password']);
            // Check password
            if (!$user or !Hash::check($data['password_old'], $user->password)){
                return response([
                    'message' => 'Не верная пара логин/пароль'
                ], 401);
            }
        }else{
            if (isset($data['password'])){
                unset($data['password']);
            }
        }

        if ($avatar = $this->save_img($request, 'avatar', self::IMAGE_PATH)){
            $data['avatar'] = $avatar;
            if (is_file(base_path('public/storage/' . $user->avatar))){
                unlink(base_path('public/storage/' . $user->avatar));
            }
        }elseif ($request->has('delete_avatar')){
            $data['avatar'] = '';
            if (is_file(base_path('public/storage/' . $user->avatar))){
                unlink(base_path('public/storage/' . $user->avatar));
            }
        }

        if ($request->has('new_email') and $data['new_email']){
            $data['email'] = $data['new_email'];
        }

        unset($data['new_email']);
        unset($data['password_old']);
        if (is_null($data['password'])){
            unset($data['password']);
        }

        $user->update($data);

        /*
         * Перенаправляем взависимости от нажатой кнопки
         */
        return $this->redirectAdmin($request, 'user', $id);
    }

    /**
     * Удаление пользователя
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back();
    }
}
