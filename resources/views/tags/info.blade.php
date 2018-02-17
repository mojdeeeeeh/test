@extends('layouts.main2')

@section('content')
<section id="hero" style="height: 90px">
   <div class="hero-container" >
   </div>
</section>
<section id="about">
   <div class="container f-byekan">
      <div class="row about-container">
         <ul class="timeline">
       
            <li class="time-label">
               <span class="bg-blue text-bold ">
               {{ $tag->value }}
               </span>
            </li>
         
            @foreach($tag->posts as $post)
            <li>
               <i class="fa fa-comment bg-aqua bg-purple color1"></i>
               <div class="timeline-item">
                  <h3 class="timeline-header"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                  <div class="timeline-body">
                     {{ $post->brief }}
                  </div>
                  <div class="timeline-footer">
                  </div>
               </div>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
</section>
@endsection

