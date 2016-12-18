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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('bands')->truncate();
        DB::table('albums')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(BandsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
    }
}
