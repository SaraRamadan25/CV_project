<?php

namespace Tests\Feature;

use App\Models\Education;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EducationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function only_authenticated_users_can_add_their_experience()
    {
        $user = User::factory()->create();

        $attributes = Education::factory()->create()->toArray();
        $this->actingAs($user)
            ->post('/education', $attributes)
            ->assertRedirect(route('education.index'))
            ->assertSessionHas('msg', 'Education created successfully');
    }

    /** @test */
    public function only_authenticated_users_can_update_their_experience(){
        $user = User::factory()->create();

        $education= Education::factory()->create(['user_id' => $user->id]);

        $attributes = [
            'name' => 'MANS',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'user_id' => $user->id,
        ];

        $this->actingAs($user)
            ->patch('education/' . $education->id, $attributes)
            ->assertRedirect(route('education.index'))
            ->assertSessionHas('msg', 'education updated successfully');
        $this->assertDatabaseHas('educations', $attributes);
    }
}
