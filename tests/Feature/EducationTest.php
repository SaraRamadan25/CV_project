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
        $user = User::factory()->create();
        $education = Education::factory()->create();

        unset($education['created_at']);
        unset($education['updated_at']);

// Assert that the objects are created and saved
        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertDatabaseHas('educations', $education->toArray());

// Attach the education to the user
        $user->educations()->attach($education);

// Assert that the relation is created
        $this->assertDatabaseHas('education_user', [
            'user_id' => $user->id,
            'education_id' => $education->id,
        ]);
    }

    /** @test */
    public function only_authenticated_users_can_update_their_education()
    {
        // this test passed without user_id in educations table, but the one above don't
        $user = User::factory()->create();
        $education = Education::factory()->create(['user_id' => $user->id]);

        $updatedEducationAttributes = [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'user_id' => $user->id,
        ];

        $education = Education::find($education->id);
        $education->update($updatedEducationAttributes);

        $this->actingAs($user)
            ->patch('education/' . $education->id, $updatedEducationAttributes);
        $this->get('education/' . $education->id . '/edit')
            ->assertOk();

        $this->assertDatabaseHas('educations', $updatedEducationAttributes);
    }

}
