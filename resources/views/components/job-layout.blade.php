@php
 $JobType='FullTime';
 $companyname='Adidas';
 $JobDesg='Software Developer';
 $Location='Chennai';
@endphp 
<x-base-layout>
    {{$slot}}
    <section class="site-section" id="next">
        <div class="container">
    
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">{{ $relatedortotal }}</h2>
            </div>
          </div>
          
          <ul class="job-listings mb-5">
            @for($i=0;$i<7;$i++)
              <x-small.jobcard :$JobType :$companyname :$JobDesg :$Location/>
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
    
      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Looking For A Job?</h2>
              <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="{{ route('Auth') }}" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
          </div>
        </div>
      </section>
</x-base-layout>