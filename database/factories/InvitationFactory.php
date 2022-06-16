<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Seating;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationFactory extends Factory
{
    protected $model = Invitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seating_id' => Seating::inRandomOrder()->first()->id,
            'guest_code' => Invitation::generateGuestCode(),
            'name'       => $this->faker->name,
            'phone'      => "82244872421",
            'guests'     => 2,
        ];
    }
}
