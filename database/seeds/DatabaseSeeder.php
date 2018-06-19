<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement("SET FOREIGN_KEY_CHECKS=0;");

        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);

        $this->call(CountryTableSeeder::class);
        $this->call(CityTableSeeder::class);


        $this->call(StopTableSeeder::class);
        $this->call(TransportTypeTableSeeder::class);
        $this->call(TransportTableSeeder::class);
        $this->call(VehicleTableSeeder::class);
        $this->call(RouteTableSeeder::class);

        $this->call(EventLogsTableSeeder::class);

        DB::statement("SET FOREIGN_KEY_CHECKS=1;");

    }
}
