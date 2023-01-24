<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companynumber extends Model
{
    use HasFactory;

    protected $table = 'companynumbers';

    protected $fillable = [
        'number',
        'number_title_en', 'number_title_es'
    ];
}
