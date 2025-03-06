<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PractitionerAvailability extends Model
{
    use SoftDeletes;

    protected $table = 'practitioner_availability';

    protected $fillable = [
        'practitioner_id',
        'start_at',
        'end_at',
    ];
}
