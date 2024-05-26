<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class harga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('harga')->insert([
            ['nama' => 'Couple', 'harga' => 500000.00],
            ['nama' => 'Wedding', 'harga' => 2000000.00],
            ['nama' => 'Pre-Wedding', 'harga' => 1500000.00],
        ]);
    }
}
