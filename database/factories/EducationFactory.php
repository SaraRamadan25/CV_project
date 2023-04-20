<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
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
            'duration'=>"2005-07-18 00:00",
            'description'=>fake()->paragraph(),
            'user_id'=>$randomUserId
        ];
    }
}
