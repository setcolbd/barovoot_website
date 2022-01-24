<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

        echo "Admin User Created \n";
    }
}
