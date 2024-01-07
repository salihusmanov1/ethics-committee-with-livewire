<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppStatus extends Model
{
    protected $table = 'app_status';

    public function Checklist()
    {
        return $this->hasOne(ChecklistForm::class, 'app_id', 'id');
    }

    public function form()
    {
        return $this->belongsTo(Forms::class, 'form_type', 'id');
    }

    protected $fillable = [
        'user_id',
        'form_id',
        'form_type',
        'checklist_form_id',
        'status',
        'user_email',
        'admin_comment'
    ];

    use HasFactory;
}
