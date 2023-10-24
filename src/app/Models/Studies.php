<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studies extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'study_date',
        'content_name',
        'language_name',
        'study_time',
    ];
}
