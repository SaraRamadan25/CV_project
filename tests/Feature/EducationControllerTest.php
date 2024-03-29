<?php

namespace Tests\Feature;

use App\Models\Education;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EducationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function gusts_cannot_add_their_education(){

        $education = Education::factory()->create();
        $user = User::factory()->create();
        $this->get('/education')->assertRedirect('/login');
        $this->post('/education', ['user_id' => $user->id] + $education->toArray())->assertRedirect('/login');
        $this->assertDatabaseMissing('educations',$education->toArray());
    }
        /** @test */

    public function only_authenticated_users_can_add_their_education()
    {
        $education = Education::factory()->create();
        $user = User::factory()->create();
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

    /** @test */

    public function gusts_cannot_update_their_education(){
    $user = User::factory()->create();
    $education = Education::factory()->create();

    $updatedEducationAttributes = [
        'name' => 'New Name',
        'duration' => '2023-04-12 10:00:00',
        'description' => 'new description',
        'education_id' => $education->id,
    ];

    $this->post('/education',['user_id' => $user->id] + $updatedEducationAttributes)->assertRedirect('/login');
    $this->assertDatabaseMissing('educations',$education->toArray());
    $this->assertDatabaseMissing('educations',$updatedEducationAttributes);

}
    /** @test */

    public function only_authenticated_users_can_update_their_education()
    {
        $user = User::factory()->create();
        $education = Education::factory()->create();

        $updatedEducationAttributes = [
            'name' => 'New Name',
            'duration' => '2023-04-12 10:00:00',
            'description' => 'new description',
            'education_id' => $education->id,
        ];

        $education->users()->attach($user->id);

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
