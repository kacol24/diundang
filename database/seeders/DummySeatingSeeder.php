<?php

namespace Database\Seeders;

use App\Models\Seating;
use Illuminate\Database\Seeder;

class DummySeatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('seatings')->truncate();

        Seating::factory()->count(20)->create();
    }
}
