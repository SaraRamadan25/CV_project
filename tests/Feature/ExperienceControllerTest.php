<?php

namespace Tests\Feature;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperienceControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function gusts_cannot_add_their_experience(){

    $experience = Experience::factory()->create();
    $user = User::factory()->create();
    $this->get('/experience')->assertRedirect('/login');
    $this->post('/experience',['user_id' => $user->id] + $experience->toArray());
    $this->assertDatabaseMissing('experiences',$experience->toArray());
}
    /** @test */

    public function only_authenticated_users_can_add_their_experience()
    {
        $experience = Experience::factory()->create();
        $user = User::factory()->create();

        $experience->users()->attach($user->id);
        $attributes = $experience->toArray();
        $attributes['experience_id'] = $experience->id;

        $this->actingAs($user)
            ->post('/experience', $attributes)
            ->assertRedirect(route('experience.index'))
            ->assertSessionHas('msg', 'Experience created successfully');

        $pivot = $experience->users()->where('user_id', $user->id)->first()->pivot;
        $this->assertEquals($user->id, $pivot->user_id);

        $this->assertDatabaseHas('experience_user', [
            'user_id' => $user->id,
            'experience_id' => $experience->id,
        ]);
    }

    /** @test */
    public function gusts_cannot_update_their_experience(){

    $user = User::factory()->create();
    $experience = Experience::factory()->create();

    $updatedExperienceAttributes = [
        'name' => 'New Name',
        'duration' => '2023-04-12 10:00:00',
        'description' => 'new description',
        'experience_id' => $experience->id,
    ];

    $this->patch('/experience/' . $experience->id, $updatedExperienceAttributes)
        ->assertRedirect('/login');
    $this->assertDatabaseMissing('experiences', $experience->toArray());
    $this->assertDatabaseMissing('experiences', $updatedExperienceAttributes);
}

    /** @test */
    public function only_authenticated_users_can_update_their_experience()
    {

        $user = User::factory()->create();
        $experience = Experience::factory()->create();

        $updatedExperienceAttributes = [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'experience_id' => $experience->id,
        ];

        $experience->users()->attach($user->id);

        $this->actingAs($user)
            ->patch('/experience/' . $experience->id, $updatedExperienceAttributes)
            ->assertRedirect(route('experience.index'))
            ->assertSessionHas('msg', 'experience updated successfully');

        $this->assertDatabaseHas('experiences', [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'id' => $experience->id
        ]);

        $this->assertDatabaseHas('experience_user', [
            'user_id' => $user->id,
            'experience_id' => $experience->id,
        ]);
    }

}
