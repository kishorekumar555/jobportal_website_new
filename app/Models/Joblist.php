<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'job_title',
        'location',
        'job_region',
        'job_type',
        'job_description',
        'company_name',
        'company_tagline',
        'company_description',
        'company_website',
        'company_facebook',
        'company_twitter',
        'company_linkedin',
        'featured_image',
        'company_logo',
    ];
}
