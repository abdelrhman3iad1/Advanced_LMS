<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LectureContentMorph;
class LectureText extends Model
{
    use LectureContentMorph;

    protected $fillable = [
        'content',
    ];

}
