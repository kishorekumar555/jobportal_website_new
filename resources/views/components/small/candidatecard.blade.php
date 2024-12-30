@php
    $Resume_path="path"
@endphp
@props(['Name'=>'Name','JobDesignation'=>'Job Designation','Applied'=>'12/10/2024'])
<li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
    <a href="{{ $Resume_path }}"></a>
    <div class="job-listing-logo">
      <img src="/images/job_logo_1.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
      <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
        <h2>{{ $Name }}</h2>
        <strong>{{ $JobDesignation }}</strong>
      </div>
      <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
        </span>Applied On:{{$Applied}}
      </div>
      
      <div class="job-listing-meta">
        <span class="badge badge-danger">
            View Resume</span>
      </div>
    </div>
    
  </li>