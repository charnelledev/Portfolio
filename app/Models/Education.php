<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    // Laravel va utiliser cette table au lieu de "education"
    protected $table = 'educations';

    protected $fillable = [
        'institution',
        'period',
        'degree',
        'department',
    ];
}



