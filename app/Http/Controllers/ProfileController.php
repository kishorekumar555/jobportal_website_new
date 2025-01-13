<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        return view('profile', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'work_experiences' => 'nullable|array',
            'work_experiences.*.job_title' => 'required_with:work_experiences|string|max:255',
            'work_experiences.*.company_name' => 'required_with:work_experiences|string|max:255',
            'work_experiences.*.start_date' => 'required_with:work_experiences|date',
            'work_experiences.*.end_date' => 'nullable|date|after_or_equal:work_experiences.*.start_date',
            'work_experiences.*.description' => 'nullable|string|max:1000'
        ]);

        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['success' => false, 'message' => 'Profile not found.'], 404);
        }

        $profile->full_name = $request->input('full_name');
        $profile->email = $request->input('email');

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo) {
                Storage::delete($profile->profile_photo);
            }
            $profile->profile_photo = $request->file('profile_photo')->store('profile_photos');
        }

        // Save work experiences as JSON
        $profile->work_experiences = json_encode($request->input('work_experiences', []));

        if ($profile->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully.',
                'profile' => $profile
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to update profile.']);
    }
}
