<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $table = 'participants';

    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'children_consent',
        'pupils_consent',
        'app_form_id',
    ];
    use HasFactory;
}
