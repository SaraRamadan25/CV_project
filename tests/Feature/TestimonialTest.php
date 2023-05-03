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

    public function test_only_authenticated_users_can_add_testimonials()
    {
        $user = User::factory()->create();
        $testimonial = Testimonial::factory()->make()->toArray();
        $this->post('/testimonial', $testimonial)->assertStatus(302);

        $this->actingAs($user);

        $testimonial = Testimonial::factory()->make([
            'user_id' => $user->id,
        ])->toArray();

        $testimonial['image'] = UploadedFile::fake()->image('test.png');

        $this->post('/testimonial', $testimonial)
            ->assertStatus(302)
            ->assertRedirect('/testimonial');

        $testimonial = Testimonial::latest()->first();

        unset($testimonial['created_at']);
        unset($testimonial['updated_at']);

        $this->assertDatabaseHas('testimonials', $testimonial->toArray());
        Storage::disk('public')->assertExists($testimonial['image_path']);
    }

    /** @test */

    public function only_authenticated_users_can_update_testimonials()
    {
        Storage::fake('public'); // Use this to fake the storage disk

        $user = User::factory()->create();

        $testimonial = Testimonial::factory()->create([
            'user_id' => $user->id,
        ]);

        $file = UploadedFile::fake()->image('test.jpg');

        $attributes = [
            'name' => 'HTML',
            'description' => 'new description',
            'user_id' => $user->id,
            'image' => $file,
        ];

        $this->actingAs($user)
            ->patch(route('testimonial.update', $testimonial), $attributes)
            ->assertRedirect(route('testimonial.index'));

        $this->assertDatabaseHas('testimonials', [
            'name' => 'HTML',
            'description' => 'new description',
            'user_id' => $user->id,
        ]);

        Storage::disk('public')->assertExists($testimonial->image_path);
    }


}
