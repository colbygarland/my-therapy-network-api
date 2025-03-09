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
        'practition_type_id',
    ];

    protected $dates = [
        'start_at',
        'end_at',
    ];

    protected $appends = [
        'practitioner',
        'practition_type',
    ];

    protected function getPractitionerAttribute()
    {
        return Practitioner::find($this->practitioner_id);
    }

    protected function getPractitionTypeAttribute()
    {
        return PractitionType::find($this->practition_type_id);
    }
}
