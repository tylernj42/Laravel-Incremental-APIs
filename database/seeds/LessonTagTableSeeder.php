<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Lesson;
use App\Tag;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $lesson_ids = Lesson::pluck('id')->all();
        $tag_ids = Tag::pluck('id')->all();

        foreach(range(1, 30) as $index){
            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lesson_ids),
                'tag_id' => $faker->randomElement($tag_ids)
            ]);
        }
    }
}
