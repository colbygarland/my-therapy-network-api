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

    protected $appends = [
        'practition_types',
    ];

    protected function getPractitionTypesAttribute()
    {
        return PractitionType::where('practitioner_id', $this->id)
            ->join('practitioner_types', 'practition_types.id', '=', 'practitioner_types.type_id')
            ->pluck('practition_types.type')
            ->toArray();
    }
}
