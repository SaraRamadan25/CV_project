<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {
        $userIds = User::pluck('id'); // get all user IDs from the database
        $randomUserId = $this->faker->randomElement($userIds); // pick a random user ID

        return [
            'name' => fake()->name(),
            'duration'=>fake()->date(),
            'description'=>fake()->paragraph(),
            'user_id'=>$randomUserId,
        ];
    }
}
