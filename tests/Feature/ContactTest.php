<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */

    public function only_authenticated_users_can_contact_with_us()
    {
        $user = User::factory()->create();
        $this->get('/contact')->assertStatus(302);
        $this->post('/contact')->assertStatus(302);

        $this->actingAs($user);
        $this->get('/contact')->assertOk();
        $attributes = Contact::factory()->raw();
        $this->post('/contact',$attributes);
        $this->assertDatabaseHas('contacts',$attributes);
    }
}
