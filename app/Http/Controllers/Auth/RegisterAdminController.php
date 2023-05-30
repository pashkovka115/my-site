<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterAdminController extends AdminController
{
    public function register()
    {
        return redirect()->route('site.home');
//        return view('auth.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
