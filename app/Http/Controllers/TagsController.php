<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Lesson;
use App\Functions\Transformers\TagTransformer;

class TagsController extends ApiController
{
    protected $tagTransformer;

    function __construct(tagTransformer $tagTransformer){
        $this->tagTransformer = $tagTransformer;
    }

    public function index($lessonId = null){
        if($lessonId === null){
            return $this->respond([
                'data' => $this->tagTransformer->transformCollection(Tag::all()->toArray())
            ]);
        }

        $lesson = Lesson::find($lessonId);
        if($lesson === null){
            return $this->respondNotFound('Lesson does not exist.');
        }
        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($lesson->tags->toArray())
        ]);
        
    }
}
