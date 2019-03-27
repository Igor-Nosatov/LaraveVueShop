<?php

use Illuminate\Database\Seeder;

use App\User;
class UserTableSeeder extends Seeder
{

  public function run()
      {
          $user = new User;
          $user->name = 'Jack Jackson';
          $user->email = 'jack@jackson.com';
          $user->password = bcrypt('user');
          $user->save();
          $user->roles()->attach(Role::where('name', 'user')->first());

          $admin = new User;
          $admin->name = 'Admin';
          $admin->email = 'shop@shop.co';
          $admin->password = bcrypt('admin');
          $admin->save();
          $admin->roles()->attach(Role::where('name', 'admin')->first());
      }
}
