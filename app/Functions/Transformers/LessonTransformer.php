<?php

namespace App\Functions\Transformers;

class LessonTransformer extends Transformer{
    public function transform($lesson){
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool']
        ];
    }
}