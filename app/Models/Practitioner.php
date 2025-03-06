<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    protected $table = 'practitioner';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
