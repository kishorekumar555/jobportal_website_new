@php
  $JobDesignation = 'Product Designer';
@endphp
<x-base-layout>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <h1 class="text-white font-weight-bold">{{ $JobDesignation }}</h1>
                <div class="custom-breadcrumbs">
                  <a href="#">Home</a> <span class="mx-2 slash">/</span>
                  <a href="#">Job</a> <span class="mx-2 slash">/</span>
                  <span class="text-white"><strong>{{ $JobDesignation }}</strong></span>
                </div>
              </div>
            </div>
          </div>
        </section>
        
</x-base-layout>
