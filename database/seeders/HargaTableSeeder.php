<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('harga')->insert([
            ['nama' => 'Couple', 'harga' => 1000000],
            ['nama' => 'Pre-Wedding', 'harga' => 2000000],
            ['nama' => 'Wedding', 'harga' => 4000000],
        ]);
    }
}
