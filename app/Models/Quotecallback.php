<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotecallback extends Model
{
    use HasFactory;

    protected $table = 'quotecallbacks';

    protected $fillable = [
        'fullname',
        'gmail',
        'phone_number'
    ];
}
