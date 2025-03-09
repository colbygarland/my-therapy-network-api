<?php

namespace App\Models;

use App\Traits\WithoutAppends;
use Illuminate\Database\Eloquent\Model;

// This is the model that holds the relationships between a practitioner and the type of service.
class PractitionerType extends Model
{
    use WithoutAppends;

    protected $fillable = ['practitioner_id', 'type_id'];

    protected $appends = [
        'practitioner',
        'type',
    ];

    protected function getPractitionerAttribute()
    {
        return Practitioner::find($this->practitioner_id);
    }

    protected function getTypeAttribute()
    {
        return PractitionType::find($this->type_id);
    }
}
