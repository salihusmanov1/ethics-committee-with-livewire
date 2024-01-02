<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $table = 'method';

    protected $primaryKey = 'id';
    protected $fillable = [
        'method',
        'app_form_id',
    ];
    public $timestamps = false;

    use HasFactory;
}
