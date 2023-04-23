<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */

    public function owner_of_the_service_can_only_see_theirs()
    {
        $user = User::factory()->create();
        $this->get('/service')->assertRedirect('/login');

        $this->actingAs($user);
        $this->get('/service')->assertOk();

    }

    /** @test */
    public function only_authenticated_users_can_add_their_services()
    {
        $user = User::factory()->create();
        $this->post('/service')->assertStatus(302);

        $this->actingAs($user);
        $attributes = Service::factory()->raw();
        $this->post('/service', $attributes)->assertRedirect('service')
        ->assertSessionHas('msg','service added successfully');

        $this->assertDatabaseHas('services', $attributes);
    }


    /** @test */
    public function only_authenticated_users_can_edit_their_services(){
        $user = User::factory()->create();

        $this->post('/service')->assertStatus(302);

        $this->actingAs($user);

        $service = Service::factory()->create(['user_id' => $user->id]);

        $newAttributes = [
            'name'=>'updated Service',
            'description'=>'new description',
            'user_id'=>$user->id
        ];

        $this->patch('/service/' .$service->id, $newAttributes)
            ->assertRedirect('/service')
            ->assertSessionHas('msg','service updated successfully');
        $this->assertDatabaseHas('services', $newAttributes);
    }


}
