<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'body', 'some_bool'];
    protected $attributes = [
        'some_bool' => false
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
