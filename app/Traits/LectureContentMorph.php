<?php

namespace App\Traits;
use App\Models\Lecture;


trait LectureContentMorph
{
    public function lecture(){
        return $this->morphOne(Lecture::class , 'contentable');
    }
}
