<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class HomeAdminController extends AdminController
{
    public function index()
    {
        return view('admin.home.index');
    }
}
