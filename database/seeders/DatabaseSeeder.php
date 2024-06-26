<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory(2)->create();


        /*\App\Models\Experience::factory(1)->create();


          \App\Models\Education::factory(1)->create();

                  \App\Models\Project::factory(1)->create();
          \App\Models\Testimonial::factory(4)->create();

        \App\Models\Category::factory(4)->create();


        \App\Models\Service::factory(1)->create();
          \App\Models\Skill::factory(1)->create();*/

        /*        \App\Models\User::factory(1)->create();*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
