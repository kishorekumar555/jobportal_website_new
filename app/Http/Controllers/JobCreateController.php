<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joblist;

class JobCreateController extends Controller
{
    public function index()
    {
        return view('job.list');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate form data
         $request->validate([
            'email' => 'required|email|unique:joblist,email',
            'job_title' => 'required',
            'location' => 'required',
            'job_region' => 'required',
            'job_type' => 'required',
            'job_description' => 'required',
            'company_name' => 'required',
            'company_description' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle file uploads if present
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('job_images', 'public');
        }

        $companyLogoPath = null;
        if ($request->hasFile('company_logo')) {
            $companyLogoPath = $request->file('company_logo')->store('company_logo', 'public');
        }

        // Insert data into the database
        Joblist::create([
            'email' => $request->email,
            'job_title' => $request->job_title,
            'location' => $request->location,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'job_description' => $request->job_description,
            'company_name' => $request->company_name,
            'company_tagline' => $request->company_tagline,
            'company_description' => $request->company_description,
            'company_website' => $request->company_website,
            'company_facebook' => $request->company_facebook,
            'company_twitter' => $request->company_twitter,
            'company_linkedin' => $request->company_linkedin,
            'featured_image' => $featuredImagePath,
            'company_logo' => $companyLogoPath,
        ]);

        // Redirect or return success message
        return redirect()->route('JobPostlist');
    }
    public function showJob(string $id){
        return view('job.show');
    }
}
