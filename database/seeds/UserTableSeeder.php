<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::truncate();

        User::create([
            "name" => "vladislav1133",
            "email" => "vladislav1133@ukr.net",
            "password" => Hash::make("fdl230Fsds235xg5fV85$6^4s"),
            "remember_token" => null,
            "token" => null,
        ]);
    }
}
