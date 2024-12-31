{{-- @php
  $userType = "jobseeker"; // Change this based on your logic
  // Placeholder values for recruiter
  $companyName = "Your Company Name";
  $companyTagline = "We hire the best!";
  $companyWebsite = "https://www.yourcompany.com";
  $phone = "+1 234 567 8901";
  $profilePhoto = null; // or 'path/to/photo.jpg' if you want to simulate an existing photo

  // Placeholder values for job seeker
  $fullName = "John Doe";
  $email = "john.doe@example.com";
  $qualifications = "BSc in Computer Science";
  $education = "University of Example\nGraduated: 2020";

  // Placeholder for work experiences
  $workExperiences = [
      [
          'job_title' => 'Software Engineer',
          'company_name' => 'Tech Solutions',
          'start_date' => 'June 2020',
          'end_date' => 'Present',
          'description' => 'Developing web applications using Laravel and Vue.js.'
      ],
      [
          'job_title' => 'Intern',
          'company_name' => 'Example Inc.',
          'start_date' => 'January 2019',
          'end_date' => 'May 2019',
          'description' => 'Assisted in software development and testing.'
      ]
  ];
@endphp --}}

<x-base-layout>
    <!-- PROFILE HEADER -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Profile</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Profile</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">

        <!-- Profile Details -->
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <h2>Your Profile</h2>
          </div>
        </div>

        <!-- Profile Form -->
        <div class="row mb-5">
          <div class="col-lg-12">
            <form id="profile-form" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="job-seeker-name">Full Name</label>
                  <input type="text" class="form-control" id="job-seeker-name" name="full_name" value="{{ $profile->full_name ?? '' }}">
              </div>
          
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email ?? '' }}">
              </div>
          
              <div class="form-group">
                  <label for="profile_photo">Profile Photo</label>
                  @if(isset($profile->profile_photo) && $profile->profile_photo)
                      <img id="profile-photo-preview" src="{{ asset('storage/' . $profile->profile_photo) }}" style="width: 100px; height: auto;">
                  @endif
                  <input type="file" name="profile_photo" id="profile_photo" class="form-control">
              </div>
          
              <h3>Work Experience</h3>
              <div id="experience-section">
                  @foreach(json_decode($profile->work_experiences ?? '[]', true) as $experience)
                      <p>{{ $experience['job_title'] ?? '' }} at {{ $experience['company_name'] ?? '' }}</p>
                  @endforeach
              </div>
              <button type="button" onclick="addExperience()">Add Experience</button>
              <div id="new-experience"></div>
          
              <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
          
          <script>
          document.getElementById('profile-form').addEventListener('submit', function (event) {
              event.preventDefault();
          
              let formData = new FormData(this);
          
              fetch("{{ route('ProfileUpdate',1) }}", {
                  method: 'POST',
                  body: formData,
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                  }
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert(data.message);
                      document.getElementById('job-seeker-name').value = data.profile.full_name;
                      document.getElementById('email').value = data.profile.email;
                      if (data.profile.profile_photo) {
                          document.getElementById('profile-photo-preview').src = '/storage/' + data.profile.profile_photo;
                      }
                      document.getElementById('profile-form').reset();
                  } else {
                      alert('Failed to update profile.');
                  }
              })
              .catch(error => console.error('Error:', error));
          });
          
          function addExperience() {
              const experienceDiv = document.createElement('div');
              experienceDiv.classList.add('work-experience', 'mb-3');
          
              experienceDiv.innerHTML = `
                  <p><input type='text' name='work_experiences[][job_title]' placeholder='Job Title' required /></p>
                  <p><input type='text' name='work_experiences[][company_name]' placeholder='Company Name' required /></p>
                  <p>Start Date: <input type='date' name='work_experiences[][start_date]' required /> 
                     End Date: <input type='date' name='work_experiences[][end_date]'/></p>
                  <textarea name='work_experiences[][description]' rows='2' placeholder='Description'></textarea>
              `;
              document.getElementById('new-experience').appendChild(experienceDiv);
          }
          </script>
          

</x-base-layout>
