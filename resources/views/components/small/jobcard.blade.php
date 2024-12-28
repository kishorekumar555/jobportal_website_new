@props(['JobType'=>'JobType','companyname'=>'CompanyName','JobDesg'=>'Job Designation','Location'=>'Location'])
<li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
    <a href="job-single.html"></a>
    <div class="job-listing-logo">
      <img src="/images/job_logo_1.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
      <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
        <h2>{{ $JobDesg }}</h2>
        <strong>{{ $companyname }}</strong>
      </div>
      <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
        <span class="icon-room"></span>{{$Location}}
      </div>
      <div class="job-listing-meta">
        <span class="badge badge-danger">{{ $JobType }}</span>
      </div>
    </div>
    
  </li>