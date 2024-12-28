@php
$totalcandidates=45;
$totalJobPosted=10;
$JobsFilled=10;
$Companies=45;
$trending1='Machine Learning';
$trending2='Software Development';
$trending3='DevOps';
@endphp  
<x-job-layout>
        <!-- HOME --> 
        <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
          <x-small.searchjob :$trending1 :$trending2 :$trending3></x-small.searchjob>  
            <x-small.scrolldown></x-small.scrolldown>
          </section>
          
          <x-small.jobstats :$totalcandidates :$totalJobPosted :$JobsFilled :$Companies/>
          <x-slot:relatedortotal>43,167 Job Listed</x-slot:relatedortotal>
</x-job-layout>
