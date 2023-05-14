<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordAdminController extends AdminController
{
    public function create(Request $request)
    {
        return view('auth.forgot-password');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT){
            return back()->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))->withErrors(['email' => trans($status)]);
    }
}
