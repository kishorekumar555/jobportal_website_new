<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'profile_photo',
        'work_experiences'
    ];

    /**
     * Accessor to decode work experiences JSON.
     */
    public function getWorkExperiencesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    /**
     * Mutator to encode work experiences JSON.
     */
    public function setWorkExperiencesAttribute($value)
    {
        $this->attributes['work_experiences'] = json_encode($value);
    }
}
