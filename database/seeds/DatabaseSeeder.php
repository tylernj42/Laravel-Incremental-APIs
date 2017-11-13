<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Lesson::truncate();
        Tag::truncate();
        DB::table('lesson_tag')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }
}
