<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
           'name' => 'O2'
        ]);

        DB::table('providers')->insert([
            'name' => 'Telekom'
        ]);
    }
}
