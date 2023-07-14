<?php

namespace Database\Seeders;

use App\Models\Permissions\Permission;
use App\Models\User;
use App\Servises\Admin;
use App\Servises\ReaderControllers;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $methods = (new ReaderControllers())->getActions();

        $num = 0;
        foreach ($methods as $method){
            $num++;
            Permission::create([
                'name' => $method['action'],
                'description' => $method['doc'] ? $method['doc'] : "Описание метода $num",
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
