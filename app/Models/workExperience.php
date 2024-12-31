<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id', 'job_title', 'company_name', 'start_date', 'end_date', 'description'
    ];
}
