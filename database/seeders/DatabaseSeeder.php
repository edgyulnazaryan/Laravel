<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
