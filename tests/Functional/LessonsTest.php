<?php

namespace Tests\Functional;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends ApiTester
{
    public function test_if_it_fetches_lessons(){
        $this->times(3)->makeLesson();

        $this->getJson('api/vi/lessons');

        $this->assertResponseOk();
        $this->assertResponseOk();
    }

    private function makeLesson($lessonFields = []){
        $lesson = array_merge([
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'some_bool' => $this->faker->boolean
        ], $lessonFields);

        while($this->times--){
            Lesson::create($lesson);
        }
    }
}
