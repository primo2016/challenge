<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User;

        $user->name = "Daniel";
        $user->email = "daniel@gmail.com";
        $user->password = "123123";

        $user->save();



    }
}
