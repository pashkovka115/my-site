<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
