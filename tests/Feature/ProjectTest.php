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
        Storage::fake('public'); // Use this to fake the storage disk

        $user = User::factory()->create();
        $category = Category::factory()->create();

        $project = Project::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $file = UploadedFile::fake()->image('test.jpg');

        $attributes = [
            'name' => 'HTML',
            'type' => 'new type',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'image' => $file,
        ];
        $this->actingAs($user)
            ->patch(route('project.update', $project), $attributes)
            ->assertRedirect(route('project.index'));

        $this->assertDatabaseHas('projects', [
            'name' => 'HTML',
            'type' => 'new type',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

    }


}
