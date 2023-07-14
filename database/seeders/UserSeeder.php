<?php

namespace Database\Seeders;

use App\Models\User;
use App\Servises\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@mail.ru';
        $admin->password = bcrypt('admin');
        $admin->is_admin = 1;
        $admin->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@mail.ru';
        $user->password = bcrypt('user');
        $user->save();

        Role::create([
            'name' => Admin::superUserName(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $admin->assignRole(Admin::superUserName());
    }
}
