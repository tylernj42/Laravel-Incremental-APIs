<?php

namespace App\Functions\Transformers;

class TagTransformer extends Transformer{
    public function transform($lesson){
        return [
            'name' => $lesson['name'],
        ];
    }
}