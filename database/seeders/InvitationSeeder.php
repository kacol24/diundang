<?php

namespace Database\Seeders;

use App\Models\Invitation;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invitation::create([
            'seating_id' => 1,
            'guest_code' => '82244872421',
            'name' => 'Kevin & Nanda',
            'phone' => 82244872421,
            'guests' => 2,
        ]);

        Invitation::factory()->count(200)->create();
    }
}
