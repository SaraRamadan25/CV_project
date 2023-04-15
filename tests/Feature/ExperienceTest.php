<?php

namespace Tests\Feature;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperienceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function only_authenticated_users_can_add_their_experience()
    {
        $user = User::factory()->create();

        $attributes = Experience::factory()->create()->toArray();
        $this->actingAs($user)
            ->post('/experience', $attributes)
            ->assertRedirect(route('experience.index'))
            ->assertSessionHas('msg', 'Experience created successfully');
    }

    /** @test */
    public function only_authenticated_users_can_update_their_experience(){
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $experience = Experience::factory()->create(['user_id' => $user->id]);

        $attributes = [
            'name' => 'HTML',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'user_id' => $user->id,
        ];

        $this->actingAs($user)
            ->patch('experience/' . $experience->id, $attributes)
            ->assertRedirect(route('experience.index'))
            ->assertSessionHas('msg', 'experience updated successfully');
        $this->assertDatabaseHas('experiences', $attributes);
    }


}

