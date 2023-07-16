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

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user_admin = new User();
        $user_admin->name = 'admin';
        $user_admin->email = 'admin@mail.ru';
        $user_admin->password = bcrypt('admin');
        $user_admin->is_admin = 1;
        $user_admin->save();

        $user_writer = new User();
        $user_writer->name = 'user';
        $user_writer->email = 'user@mail.ru';
        $user_writer->password = bcrypt('user');
        $user_writer->save();

        /*Role::create([
            'name' => Admin::superUserName(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $admin->assignRole(Admin::superUserName());*/

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_super_admin = Role::create(['name' => Admin::superUserName()]);
        $role_writer = Role::create(['name' => 'Писатель']);

        $methods = (new ReaderControllers())->getActions();

        $num = 0;
        foreach ($methods as $method){
            $num++;
            $perm = \Spatie\Permission\Models\Permission::create([
                'name' => $method['action'],
                'description' => $method['doc'] ? $method['doc'] : "$num",
//                'guard_name' => 'web',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
            ]);

            if (str_starts_with($method['doc'], 'Форма') || str_starts_with($method['doc'], 'Сохранение')){
                $role_writer->givePermissionTo($method['action']);
            }
        }

        $role_super_admin->givePermissionTo(\Spatie\Permission\Models\Permission::all());
        $user_admin->assignRole(Admin::superUserName());

        $user_writer->assignRole($role_writer);
    }
}
