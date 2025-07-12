<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\LevelType;

class Course extends Model
{
    protected $fillable = [
        'title',
        'bio',
        'slug',
        'description',
        'price',
        'final_price',
        'learnings',
        'for',
        'requirments',
        'thumbnail',
        'level',
        'instructor_id',
    ];

    protected $casts = [
        'learnings'=>'array',
        'for'=>'array',
        'requirments'=>'array',
        'level'=> LevelType::class,
    ];

    public function instructor(){
        return $this->belongsTo(User::class,'instructor_id');
    }
}
