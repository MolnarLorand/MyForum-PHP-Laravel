<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
/*        $user = User::factory()->create([   //for specific data
            'name' => 'Molnar Lorand'
        ]);
        in factory->         'user_id' => $user->id*/


        Post::factory(6)->create([
        ]);

/*        User::truncate();
        Post::truncate();
        Category::truncate();*/

//         $user = User::factory()->create();

/*         $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);

         $family = Category::create([
             'name' => 'Family',
             'slug' => 'family'
         ]);

         $work = Category::create([
             'name' => 'Work',
             'slug' => 'work'
         ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=> $family->id,
            'title' => 'My family thread',
            'slug' => 'my-family-thread',
            'fragment' => '<p>Fragment from family</p>',
            'body' => '<p>Family is a fundamental aspect of human life and is an integral part of many cultures worldwide. It typically includes a group of individuals related by blood, marriage, or adoption, who share common values, beliefs, and experiences. Family provides a sense of belonging and identity, and it often serves as a support system for individuals during times of need. It is where we learn our first lessons about love, trust, and responsibility, and it plays a crucial role in shaping our personality, behavior, and socialization.</p>'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=> $work->id,
            'title' => 'My work thread',
            'slug' => 'my-work-thread',
            'fragment' => '<p>Fragment from family</p>',
            'body' => '<p>Work is an essential part of human life, providing us with a sense of purpose, fulfillment, and financial stability. It involves the application of skills, knowledge, and effort to achieve a particular goal or objective. While work can be rewarding, it can also be challenging and demanding. Many people struggle with job-related stress, burnout, and work-life balance issues. It is crucial to prioritize self-care and set healthy boundaries to maintain a healthy relationship with work.</p>'
        ]);*/
    }
}
