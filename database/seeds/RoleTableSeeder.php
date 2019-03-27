<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

  public function run()
        {
            $role_regular_user = new Role;
            $role_regular_user->name = 'user';
            $role_regular_user->description = 'User';
            $role_regular_user->save();

            $role_admin_user = new Role;
            $role_admin_user->name = 'admin';
            $role_admin_user->description = 'Admin';
            $role_admin_user->save();
        }
}
