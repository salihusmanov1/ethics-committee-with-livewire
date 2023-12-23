<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistForm extends Model
{
    protected $table = 'checklist_form';

    protected $fillable = [
        'user_id',
        'attach_form',
        'attach_parental',
        'debriefing',
        'question_1',
        'question_2_a',
        'question_2_b',
        'question_3_a',
        'question_3_b',
        'question_3_c',
        'question_3_d',
        'question_3_e',
        'question_3_f',
        'question_3_g',
        'question_3_h',
        'question_3_i',
        'question_3_j',
        'question_3_k',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_7_a',
        'question_7_b',
        'question_7_c',
        'question_8',
        'question_8_a',
        'question_8_b',
        'question_8_c',
        'question_8_d',
        'question_8_d_i',
        'question_8_d_ii',
        'question_8_d_iii',
        'question_9',
        'question_10',
        'question_11',
    ];
    use HasFactory;

    use HasFactory;
}
