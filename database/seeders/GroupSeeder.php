<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'name' => 'Keluarga Kevin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keluarga Nanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Papa Kevin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Papa Nanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mama Kevin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mama Kevin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teman Kevin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teman Nanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Koko Ori',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yolen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('groups')->insert($insert);
    }
}
