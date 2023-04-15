<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        $randomUserId = $this->faker->randomElement($userIds);
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'role' => fake()->word(),
            'image' => fake()->image(),
            'user_id'=>$randomUserId,

        ];
    }
}
