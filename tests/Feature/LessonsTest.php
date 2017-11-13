<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lesson;

class LessonsTest extends ApiTester
{
    public function test_if_it_fetches_lessons(){
        $this->makeLesson();
        $response = $this->json('GET', 'api/v1/lessons');
        $response->assertStatus(200);
    }

    public function test_if_it_fetches_single_lesson(){
        $this->makeLesson();
        $response = $this->json('GET', 'api/v1/lessons/1');
        $response->assertStatus(200)->assertJson([
            'data' => [
                'title' => true,
                'body' => true,
                'active' => true
            ]
        ]);
    }

    public function test_if_it_404s_if_a_lesson_is_not_found(){
        $response = $this->json('GET', 'api/v1/lessons/x');
        $response->assertStatus(404);
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
