<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // need to fill the $bandNames in the data source if you go over 8
        factory('App\Band', 8)->create();
    }
}
