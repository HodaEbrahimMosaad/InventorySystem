<?php

use App\User;
use App\UserRole;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'hodamosaad0@gmail.com',
            'password' => bcrypt(123456)
        ]);
        $id = $admin->id;
        UserRole::create([
            'user_id' => $id,
            'role_id' => 1
        ]);
    }
}
