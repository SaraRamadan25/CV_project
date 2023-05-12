<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
public function gusts_cannot_contact_with_us(){

    $user = User::factory()->create();
    $this->get('/contact')->assertStatus(302);
    $unsentattributes = Contact::factory()->raw();
    $this->post('/contact', ['user_id' => $user->id] + $unsentattributes)->assertStatus(302);
    $this->assertDatabaseMissing('contacts',$unsentattributes);
}

    /** @test */

    public function only_authenticated_users_can_contact_with_us()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get('/contact')->assertOk();
        $attributes = Contact::factory()->raw();
        $this->post('/contact',$attributes);
        $this->assertDatabaseHas('contacts',$attributes);
    }
}
