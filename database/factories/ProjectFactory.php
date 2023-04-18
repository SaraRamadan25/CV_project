<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Testing\FileFactory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $image = (new FileFactory)->image('newimage', 200, 200);

        $userIds = User::pluck('id');
        $randomUserId = $this->faker->randomElement($userIds);

        $categoryIds = Category::pluck('id');
        $randomCategoryId = $this->faker->randomElement($categoryIds);

        return [
            'name' => $this->faker->name,
            'user_id' => $randomUserId,
            'type' => $this->faker->name,
            'category_id' => $randomCategoryId,
            'image' => $image,
        ];
    }
}
