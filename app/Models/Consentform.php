<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consentform extends Model
{
    protected $table = 'consent_form';

    protected $primaryKey ='id';
    protected $fillable = [
        'r_full_name',
        'institue',
        'survey',
        'start_date',
        'end_date',
        'type',
        'question_1',
        'question_2',
        'question_3',
        'email',
        'phone_no',
        'app_form_id',
    ];
    use HasFactory;
}
