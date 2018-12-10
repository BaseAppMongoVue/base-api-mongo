<?php

use OdontoInn\Models\Role;
use OdontoInn\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {

        foreach (Role::DATA_ROLES as $data) {
            $this->generateUser($data['name']);
        }
        
    }

    private function generateUser($type)
    {

        $users = factory(User::class,rand(1,30))->create();
        
        $users->each(function ($user) use($type) {

            $role = Role::where('name', $type)->first();
            $user->roles()->attach($role);

        });

    }

}
