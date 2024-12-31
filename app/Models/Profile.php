<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type', 'full_name', 'email', 'qualifications', 'education',
        'company_name', 'company_tagline', 'company_website', 'phone', 'profile_photo'
    ];

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }
}