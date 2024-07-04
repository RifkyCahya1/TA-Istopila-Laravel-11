<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Admin sesuai form
        $adminData = [
            'name' => 'Rifky', // Ganti dengan nama sesuai keinginan
            'email' => 'rifkyp390@gmail.com', // Ganti dengan email admin yang diinginkan
            'password' => Hash::make('12345678'), // Ganti dengan password yang aman
            'type' => 'admin', // Pastikan type adalah 'admin'
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Periksa apakah admin dengan email ini sudah ada
        $existingAdmin = DB::table('users')->where('email', $adminData['email'])->first();

        if (!$existingAdmin) {
            // Insert new admin user
            DB::table('users')->insert($adminData);

            // Display a message to the console
            $this->command->info('Admin user created successfully!');
        } else {
            // If admin user already exists, display a message
            $this->command->info('Admin user already exists.');
        }
    }
}
