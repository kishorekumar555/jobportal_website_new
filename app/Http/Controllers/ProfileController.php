<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\WorkExperience;
class ProfileController extends Controller
{
    public function show($id = null)
    {
        // Load profile if ID exists, else create an empty profile object
        $profile = Profile::with('workExperiences')->find($id) ?? new Profile();
        return view('profile', compact('profile'));
    }
public function update(Request $request, $id = null)
{
    // Validate request data
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'qualifications' => 'nullable|string',
        'education' => 'nullable|string',
    ]);

    // Check if profile exists or create a new one
    $profile = Profile::updateOrCreate(
        ['id' => $id], // Find by ID
        [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qualifications' => $request->qualifications,
            'education' => $request->education,
        ]
    );

    // Handle work experiences (Add or Update)
    if ($request->has('work_experience')) {
        foreach ($request->work_experience as $experience) {
            if (isset($experience['id'])) {
                // Update existing experience
                WorkExperience::where('id', $experience['id'])->update([
                    'job_title' => $experience['job_title'],
                    'company_name' => $experience['company_name'],
                    'start_date' => $experience['start_date'],
                    'end_date' => $experience['end_date'],
                    'description' => $experience['description'],
                ]);
            } else {
                // Create new experience
                WorkExperience::create([
                    'profile_id' => $profile->id,
                    'job_title' => $experience['job_title'],
                    'company_name' => $experience['company_name'],
                    'start_date' => $experience['start_date'],
                    'end_date' => $experience['end_date'],
                    'description' => $experience['description'],
                ]);
            }
        }
    }

    // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $profile->update(['profile_photo' => $path]);
    }

    // Redirect to profile page
    return redirect()->route('ProfileShow', ['id' => $profile->id]);
}
}