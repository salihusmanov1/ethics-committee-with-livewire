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
        'app_form_id',
    ];
    use HasFactory;
}
