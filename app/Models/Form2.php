<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{

    protected $table = 'form2';

    protected $fillable = [
        'user_id',
        'app_id',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_4_1',
        'question_5',
        'question_5_1',
        'question_6',
        'question_7',
        'question_7_1',
        'rname',
        'sname',
    ];
    use HasFactory;
}
