<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Permissions\Permission;
use Illuminate\Http\Request;

class MapPermissionController extends AdminController
{
    public function index()
    {
        return view('admin.permission.index', [
            'items' => Permission::paginate(20),
        ]);
    }
}
