<?php

use Illuminate\Database\Seeder;

class OfferingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('offering')->insert([
            'title' => 'cake',
            'price' => 120,
        ]);
        DB::table('offering')->insert([
            'title' => 'food',
            'price' => 100,
        ]);
    }
}
