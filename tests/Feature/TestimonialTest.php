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
        Storage::fake('public');

        $user = User::factory()->create();
        $testimonial = Testimonial::factory()->make()->toArray();
        $this->post('/testimonial', $testimonial)->assertStatus(302);

        $this->actingAs($user);

        $testimonial = Testimonial::factory()->make([
            'user_id' => $user->id,
        ])->toArray();

        $testImage = UploadedFile::fake()->image('test.jpg');
        Storage::disk('public')->put('testimonials/test.jpg', file_get_contents($testImage));

        $testimonial['image'] = $testImage;

        $this->post('/testimonial', $testimonial)
            ->assertStatus(302)
            ->assertRedirect('/testimonial');

        $testimonial = Testimonial::latest()->first();

        unset($testimonial['created_at']);
        unset($testimonial['updated_at']);

        $this->assertDatabaseHas('testimonials', $testimonial->toArray());
        Storage::disk('public')->assertExists('testimonials/test.jpg');
    }

    /** @test */

    public function only_authenticated_users_can_update_testimonials()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        // $filename = 'test.jpg';

        $testimonial = Testimonial::factory()->create([
            'user_id' => $user->id,
        ]);

        $file = UploadedFile::fake()->image('test.jpg');

        $attributes = [
            'name' => 'HTML',
            'description' => 'new description',
            'role'=>'CEO',
            'user_id' => $user->id,
            'image' => $file,
        ];

        $this->actingAs($user)
            ->patch(route('testimonial.update', $testimonial), $attributes)
            ->assertRedirect(route('testimonial.index'));

        $updated_testimonial = Testimonial::find($testimonial->id);
        $renamed_filename = $updated_testimonial->image;

        $this->assertDatabaseHas('testimonials', [
            'name' => 'HTML',
            'description' => 'new description',
            'role'=>'CEO',
            'user_id' => $user->id,
            'image' => $renamed_filename, // check for the renamed filename
        ]);

        Storage::disk('public')->assertExists('testimonials/' . $renamed_filename);
    }




}
