<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Joblist;
use Exception;

class JobCreateController extends Controller
{
    public function index()
    {
        // Fetch the total count of job listings
        $totalJobListings = Joblist::count();

        // Pass the variable to the Blade view
        return view('home', compact('totalJobListings'));
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
            'job_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_region' => 'required|string|max:255',
            'job_type' => 'required|in:' . implode(',', [Joblist::JOB_TYPE_PART_TIME, Joblist::JOB_TYPE_FULL_TIME]),
            'job_description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_tagline' => 'nullable|string|max:255',
            'company_description' => 'required|string',
            'company_website' => 'nullable|url',
            'company_facebook' => 'nullable|url',
            'company_twitter' => 'nullable|url',
            'company_linkedin' => 'nullable|url',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle file uploads if present
            $featuredImagePath = $request->hasFile('featured_image')
                ? $request->file('featured_image')->store('job_images', 'public')
                : null;

            $companyLogoPath = $request->hasFile('company_logo')
                ? $request->file('company_logo')->store('company_logo', 'public')
                : null;

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
            return redirect()->route('JobPostlist')->with('success', 'Job posted successfully!');
        } catch (Exception $e) {
            // Log error for debugging
            Log::error('Error posting job: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while posting the job. Please try again.');
        }
    }
    public function showJob(string $id)
    {
        $job = Joblist::find($id);

        if (!$job) {
            return redirect()->route('JobPostlist')->with('error', 'Job not found.');
        }

        return view('job.show', compact('job'));
    }

}
