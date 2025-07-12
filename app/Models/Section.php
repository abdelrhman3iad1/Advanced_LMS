<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title',
        'order',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }
}
