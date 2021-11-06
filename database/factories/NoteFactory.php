<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'note' => $this->faker->text(1000),
            'user_id' => 1, // Needs to be expanded for more users as features are added
        ];
    }
}
