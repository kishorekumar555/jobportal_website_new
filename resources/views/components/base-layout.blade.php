@php 
$user="recruiter";
@endphp
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="ftco-32x32.png">
    
    <link rel="stylesheet" href="/css/custom-bs.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/fonts/line-icons/style.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <x-small.spinner></x-small.spinner>
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    @if($user=="jobseeker")
      <x-partials.header></x-partials.header>
    @elseif($user=="recruiter")
      <x-partials.recruiterhead></x-partials.recruiterhead>  
    @endif 
    {{ $slot }}
    <x-partials.footer></x-partials.footer>
    </div>
    
      <!-- SCRIPTS -->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <script src="/js/isotope.pkgd.min.js"></script>
      <script src="/js/stickyfill.min.js"></script>
      <script src="/js/jquery.fancybox.min.js"></script>
      <script src="/js/jquery.easing.1.3.js"></script>
      
      <script src="/js/jquery.waypoints.min.js"></script>
      <script src="/js/jquery.animateNumber.min.js"></script>
      <script src="/js/owl.carousel.min.js"></script>
      <script src="/js/quill.min.js"></script>
      
      
      <script src="/js/bootstrap-select.min.js"></script>
      
      <script src="/js/custom.js"></script>
     
     
    </body>
  </html>