<!-- NAVBAR -->
@props(['Pagetitle'=>''])
<header class="site-navbar mt-3">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="site-logo col-6"><a href="index.html">{{ $Pagetitle }}</a></div>

        <nav class="mx-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="{{ route('Home') }}" class="nav-link active">Home</a></li>
            <li><a href="{{ route('About') }}">About</a></li>
            <li class="has-children">
              <a href="{{ route('Joblist') }}">Job Listings</a>
              <ul class="dropdown">
                <li><a href="{{ route('Jobshow',1) }}">Job Single</a></li>
                <li><a href="{{ route('Jobcreate') }}">Post a Job</a></li>
                <li><a href="{{ route('JobPostlist') }}">Job Post Listing</a></li>
              </ul>
            </li>
            <li><a href="{{ route('Contact') }}">Contact</a></li>
          </ul>
        </nav>
        
        <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
          <div class="ml-auto">
            <a href="{{ route('Jobcreate') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Profile</a>
            <a href="{{ route('Auth') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Sign Up/Log In</a>
          </div>
          <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
        </div>

      </div>
    </div>
  </header>