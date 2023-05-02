<?php

namespace Tests\Feature;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TestimonialTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */


    /** @test */

    public function only_authenticated_users_can_add_testimonials()
    {
        $user = User::factory()->create();

         $this->get('/testimonial/create')
        ->assertStatus(302);

        $this->actingAs($user)
            ->get('/testimonial/create')
            ->assertStatus(200);


        // Create a testimonial with the authenticated user and assert that it was added successfully
        $testimonial = Testimonial::factory()->create(['user_id' => $user->id])->toArray();
        unset($testimonial['created_at']);
        unset($testimonial['updated_at']);

        $testimonial['image']=UploadedFile::fake()->image('test.png');

        $this->post('/testimonial', $testimonial)
            ->assertRedirect(route('testimonial.index'))
            ->assertSessionHas('msg', 'Testimonial added successfully');
        $this->assertDatabaseHas('testimonials', $testimonial);

    }

    /** @test */

    public function only_authenticated_users_can_update_testimonials(){
        Storage::fake('public'); // Use this to fake the storage disk

        $user = User::factory()->create();

        $testimonial = Testimonial::factory()->create(['user_id' => $user->id]);

        $file = UploadedFile::fake()->image('test.png');

        $attributes = [
            'name' => 'HTML',
            'description' => 'new description',
            'role' => 'manager',
            'user_id' => $user->id,
            'image' => $file,

        ];

        $this->actingAs($user)
            ->patch('testimonial/' . $testimonial->id, $attributes)
            ->assertRedirect(route('testimonial.index'))
            ->assertSessionHas('msg', 'Testimonial updated successfully');
        $this->assertDatabaseHas('testimonials', $attributes);
    }

}
