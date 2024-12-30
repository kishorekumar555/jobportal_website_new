@php
  $JobDesignation = "Software Engineer";
@endphp
<x-base-layout>
  <!-- HOME -->
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold"></h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>{{ $JobDesignation }}</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="site-section" id="next">
      <div class="container">
  
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Candidates Applied</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          @for($i=0;$i<7;$i++)
            <x-small.candidatecard :$JobDesignation/>
          @endfor
        </ul>
  
        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 43,167 Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div>
  
      </div>
    </section>
</x-base-layout>  
