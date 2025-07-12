<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionLecture extends Model
{
    protected $fillable = [
        'order',
        'lecture_id',
        'section_id',
    ];

    public function lecture(){
        return $this->belongTo(Lecture::class , 'lecture_id');
    }

    public function section(){
        return $this->belongsTo(Section::class , 'section_id');
    }
}
