<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    protected $fillable = [
        'course_id',
        'topic_id',
    ];

    public function course(){
        return $this->belongTo(Course::class , 'course_id');
    }

    public function topic(){
        return $this->belongsTo(Topic::class , 'topic_id');
    }
}
