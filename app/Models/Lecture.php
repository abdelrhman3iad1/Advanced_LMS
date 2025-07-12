<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'previewable',
        'duration',

        'contentable_id',
        'contentable_type',

        'course_id',
    ];

    public function contentable(){
        return $this->morphTo();
    }

}
