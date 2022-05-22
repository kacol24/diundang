<?php

namespace Database\Factories;

use App\Models\Invitation;
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
            'seating_id' => $this->faker->numberBetween(1, 20),
            'guest_code' => \Str::random(6),
            'name'       => $this->faker->name,
            'phone'      => "82244872421",
            'guests'     => 2,
        ];
    }
}
