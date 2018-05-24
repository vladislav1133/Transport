<?php

use Illuminate\Database\Seeder;

use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::role()->create(['name' => 'super-admin', 'title' => 'Super Administrator']);
        Bouncer::role()->create(['name' => 'admin', 'title' => 'Administrator']);

        $user = User::first();
        $user->assign('super-admin');
    }
}
