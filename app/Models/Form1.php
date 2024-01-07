<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form1 extends Model
{
    public function consentForm()
    {
        return $this->hasOne(ConsentForm::class, 'app_form_id', 'id');
    }
    protected $table = 'form1';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'app_id',
        'title_of_study',
        'type_of_study',
        'type_of_study_other',
        'r_full_name',
        'r_department',
        'r_institute',
        'r_phone_no',
        'r_address',
        'r_email',
        'a_title',
        'a_full_name',
        'a_department',
        'a_phone_no',
        'a_address',
        'a_email',
        'start_date',
        'end_date',
        'question_8',
        'question_8_1',
        'question_9',
        'question_9_1',
        'question_9_2',
        'question_9_3',
        'question_9_4',
        'application_status',
        'question_11',
        'question_12',
        'question_13',
        'question_14',
        'question_14_1',
        'question_15',
        'question_16',
        'question_17_1',
        'question_17_2',
        'question_18',
        'question_19',
        'question_21',
        'rp_protocol_no',
        'reporting_q_1',
        'reporting_q_2',
        'reporting_q_2_1',
        'ex_protocol_no',
        'extension_end_date',
        'extension_q_1',
        'rname',
        'rdate',
        'sname',
        'sdate',
    ];
    // public $timestamps = false;

    use HasFactory;
}
