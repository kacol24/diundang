<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(SeatingSeeder::class);
        $this->call(GroupSeeder::class);
    }
}
