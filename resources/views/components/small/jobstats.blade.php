@props(['totalcandidates'=>'','totalJobPosted'=>'','JobsFilled'=>'','Companies'=>''])
<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
          <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
        </div>
      </div>
      <div class="row pb-0 block__19738 section-counter">

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{ $totalcandidates }}">{{ $totalcandidates }}</strong>
          </div>
          <span class="caption">Candidates</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{ $totalJobPosted }}">{{ $totalJobPosted }}</strong>
          </div>
          <span class="caption">Jobs Posted</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{ $JobsFilled }}">{{ $JobsFilled}}</strong>
          </div>
          <span class="caption">Jobs Filled</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{ $Companies }}">{{ $Companies}}</strong>
          </div>
          <span class="caption">Companies</span>
        </div>

          
      </div>
    </div>
  </section>