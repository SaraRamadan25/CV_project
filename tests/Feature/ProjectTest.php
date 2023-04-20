<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */

    public function only_authenticated_users_can_access_projects_page()
    {
        $user = User::factory()->create();
        $this->get('/project')->assertStatus(302);

        $this->actingAs($user);
        $this->get('/project')->assertOk();
    }

    /** @test */

    public function only_authenticated_users_can_add_projects(){

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $this->post('/project')->assertStatus(302);

        $this->actingAs($user);
        $attributes = Project::factory()->create(['category_id' => $category->id])->toArray();

        unset($attributes['created_at']);
        unset($attributes['updated_at']);

        $this->post('/project',$attributes);
        $this->assertDatabaseHas('projects',$attributes);

    }

    /** @test */
    public function only_authenticated_users_can_update_their_projects()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $project = Project::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $newImage = UploadedFile::fake()->image('newimage.jpg');
        Storage::fake('public');
        $attributes = [
            'name' => 'HTML',
            'image' => $newImage,
            'type' => 'new type',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ];

        $this->actingAs($user)
            ->patch('project/' . $project->id, $attributes);

        $attributes['image'] = $newImage->hashName('public/images');
        $this->assertDatabaseHas('projects', $attributes);
    }

}
