<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Functions\Transformers\LessonTransformer;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends ApiController
{
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer){
        $this->lessonTransformer = $lessonTransformer;

        $this->middleware('auth.basic', ['only' => 'store']);
    }

    public function index(){
        $lessons = Lesson::all();
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]);
    }

    public function show($id){
        $lesson = Lesson::find($id);
        if(!$lesson){
            return $this->respondNotFound('Lesson does not exist.');
        }
        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    public function store(Request $request){
        if(!$request->input('title') || !$request->input('body')){
            return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
                        ->respondWithError('Parameters failed for lesson.');
        }

        Lesson::create($request->all());
        return $this->respondCreated('Lesson successfully created.');
    }
}
