@php
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
@endphp

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
            <form class="p-4 p-md-5 border rounded" method="post" enctype="multipart/form-data">
              @csrf
              <h3 class="text-black mb-5 border-bottom pb-2">Profile Details</h3>

              <!-- Conditional Fields Based on User Type -->
              @if($userType == 'recruiter')
                <!-- Recruiter Specific Fields -->
                <div class="form-group">
                  <label for="company-name">Company Name</label>
                  <input type="text" class="form-control" id="company-name" placeholder="e.g. Your Company Name" value="{{ $companyName }}">
                </div>

                <div class="form-group">
                  <label for="company-tagline">Tagline (Optional)</label>
                  <input type="text" class="form-control" id="company-tagline" placeholder="e.g. We hire the best!" value="{{ $companyTagline }}">
                </div>

                <div class="form-group">
                  <label for="company-website">Website (Optional)</label>
                  <input type="text" class="form-control" id="company-website" placeholder="https://" value="{{ $companyWebsite }}">
                </div>

              @else
                <!-- Job Seeker Specific Fields -->
                <div class="form-group">
                  <label for="job-seeker-name">Full Name</label>
                  <input type="text" class="form-control" id="job-seeker-name" placeholder="e.g. John Doe" value="{{ $fullName }}">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="you@yourdomain.com" value="{{ $email }}">
                </div>

                <!-- Qualifications -->
                <div class="form-group">
                  <label for="qualifications">Qualifications</label>
                  <input type="text" class="form-control" id="qualifications" placeholder="e.g. BSc in Computer Science" value="{{ $qualifications }}">
                </div>

                <!-- Educational Background -->
                <div class='form-group'>
                  <label for='education'>Educational Background</label>
                  <textarea class='form-control' id='education' rows='3' placeholder='Describe your educational background'>{{ $education }}</textarea>
                </div>

                <!-- Work Experience Section -->
                <h3 class='text-black my-5 border-bottom pb-2'>Work Experience</h3>
                
                <!-- Existing Work Experiences -->
                @foreach($workExperiences as $experience)
                  <div class='work-experience mb-3'>
                    <h5>{{ $experience['job_title'] }}</h5>
                    <p><strong>Company:</strong> {{ $experience['company_name'] }}</p>
                    <p><strong>Duration:</strong> {{ $experience['start_date'] }} - {{ $experience['end_date'] }}</p>
                    <p><strong>Description:</strong> {{ $experience['description'] }}</p>
                  </div> 
                @endforeach 

                <!-- New Work Experience Fields -->
                <div id='new-experience'></div>

                <!-- Add New Work Experience Button -->
                <button type='button' onclick='addExperience()' class='btn btn-secondary mt-3'>Add Work Experience</button>

              @endif

              <!-- Common Fields -->
              <h3 class='text-black my-5 border-bottom pb-2'>Contact Information</h3>

              <div class='form-group'>
                <label for='phone'>Phone Number</label>
                <input type='text' class='form-control' id='phone' placeholder='+1 234 567 8901' value="{{ $phone }}">
              </div>

              <!-- Upload Profile Photo -->
              <div class='form-group'>
                <label for='profile-photo'>Upload Profile Photo</label> 
                @if($profilePhoto)
                  <!-- Display existing photo if available -->
                  <img src="{{ asset('storage/' . $profilePhoto) }}" alt='Profile Photo' style='width: 100px; height: auto;'>
                @endif
                <br><br>
                <label class='btn btn-primary btn-md btn-file'>
                  Browse File<input type='file' name='profile_photo' hidden>
                </label>
              </div>

              <!-- Submit Button -->
              <button type='submit' class='btn btn-primary'>Save Changes</button>

            </form>
          </div>
        </div>

      </div> <!-- .container -->
    </section> <!-- .site-section -->

    <!-- JavaScript Function to Add Work Experience -->
    @push('scripts')
    <script>
      function addExperience() {
        const experienceDiv = document.createElement('div');
        experienceDiv.classList.add('work-experience', 'mb-3');

        experienceDiv.innerHTML = `
          <h5>New Work Experience</h5>
          <p><strong>Company:</strong> 
            <input type='text' name='new_company_name[]' placeholder='e.g. Tech Solutions' required />
          </p>
          <p><strong>Duration:</strong> 
            Start Date: 
            <input type='date' name='new_start_date[]' required /> 
            End Date: 
            <input type='date' name='new_end_date[]'/>
          </p>
          <p><strong>Description:</strong> 
            <textarea name='new_description[]' rows='2'></textarea>
          </p>`;
        
        document.getElementById('new-experience').appendChild(experienceDiv);
      }
    </script>
    @endpush

</x-base-layout>
