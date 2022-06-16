<?php

namespace Database\Seeders;

use App\Models\Seating;
use Illuminate\Database\Seeder;

class SeatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seatings = [
            [
                'name'       => 'Andalasia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Arendelle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Avalor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Atlantica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Costa Luna',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Dun Broch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Fang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Freezenburg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Gummadoon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Hakalo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Macadamia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Mount Olympus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Moors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Narnia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Odiferous',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Pixie Hollow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Tabor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Underland',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Weselton',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('seatings')->insert($seatings);
    }
}
