<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';

    protected $primaryKey = 'id';
    protected $fillable = [
        'organization',
        'app_form_id',
    ];
    use HasFactory;
}
