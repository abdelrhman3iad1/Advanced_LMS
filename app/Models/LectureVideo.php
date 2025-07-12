<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LectureContentMorph;

class LectureVideo extends Model
{
    use LectureContentMorph;
    protected $fillable = [
        'duration',
        'content_url',
    ];
}
