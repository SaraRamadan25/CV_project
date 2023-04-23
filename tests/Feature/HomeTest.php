<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */

    public function anyone_can_access_index_page()
    {
        $user = User::factory()->create();
        $this->get('/')->assertOk();

        $this->actingAs($user);
        $this->get('/')->assertOk();

    }

    /** @test */

    public function only_authenticated_users_can_see_the_welcome_page(){

        $user = User::factory()->create();
        $this->get('/welcome')->assertStatus(302);

        $this->actingAs($user);
        $this->get('/welcome')->assertStatus(200);
  }

}
