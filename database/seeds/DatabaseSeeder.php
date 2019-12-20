<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory as factory;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $owner = new Role();
        $owner->name         = 'user';
        $owner->display_name = 'User'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Admin'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $showRole = new Permission();
        $showRole->name         = 'show-role';
        $showRole->display_name = 'Show Role'; 
        $showRole->description  = 'create new blog posts';
        $showRole->save();

        $admin->attachPermission($showRole);

        $faker = \Faker\Factory::create();

        for($i=0; $i<=999; $i++):
            $user =new User;
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->unique()->safeEmail;
            $user->password = Hash::make('secret');
            $user->role = $i == 0 ? 'admin' : 'user';
            $user->phone = '0123456789';
            $user->verify = 'true';
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();
            $user->save();
            $user->attachRole($i == 0 ? $admin : $owner);
        endfor;
    }
}
