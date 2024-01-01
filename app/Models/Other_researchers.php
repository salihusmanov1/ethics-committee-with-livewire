<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_researchers extends Model
{
    protected $table = 'other_researchers';

    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'institue',
        'app_form_id',
    ];
    use HasFactory;
}
