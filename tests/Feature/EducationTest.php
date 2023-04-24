<?php

namespace Tests\Feature;

use App\Models\Education;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EducationTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */

    public function only_authenticated_users_can_add_their_education()
    {
        $education = Education::factory()->create();
        $user = User::factory()->create();
        $this->get('/education')->assertRedirect('/login');

        $education->users()->attach($user->id);

        $attributes = $education->toArray();
        $attributes['education_id'] = $education->id;

        $this->actingAs($user)
            ->post('/education', $attributes)
            ->assertRedirect(route('education.index'))
            ->assertSessionHas('msg', 'Education created successfully');

        $pivot = $education->users()->where('user_id', $user->id)->first()->pivot;
        $this->assertEquals($user->id, $pivot->user_id);

        $this->assertDatabaseHas('education_user', [
            'user_id' => $user->id,
            'education_id' => $education->id,
        ]);
    }

    /**
     * @test
     */
    public function only_authenticated_users_can_update_their_education()
    {
        $user = User::factory()->create();
        $education = Education::factory()->create();
        $education->users()->attach($user->id);

        $updatedEducationAttributes = [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'education_id' => $education->id,
        ];

        $this->actingAs($user)
            ->patch('/education/' . $education->id, $updatedEducationAttributes)
            ->assertRedirect(route('education.index'))
            ->assertSessionHas('msg', 'education updated successfully');

        $this->assertDatabaseHas('educations', [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'id' => $education->id
        ]);

        $this->assertDatabaseHas('education_user', [
            'user_id' => $user->id,
            'education_id' => $education->id,
        ]);
    }



}
