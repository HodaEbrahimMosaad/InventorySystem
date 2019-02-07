<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'ADMIN'],
            ['id' => 2, 'name' => 'MANAGER']
        ];
        foreach($roles as $role){
            Role::create($role);
        }
    }
}
