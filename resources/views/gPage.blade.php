 

 <div class="row">
    <div class="col-lg-12">
      <ul id="portfolio-flters">
        
        @foreach($galleries as $gallery)
        {{-- <a href="/galleries/{{ $gallery->id }}/photos"> --}}
          <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web">
            {{ $gallery->title }}
          </li>
        {{-- </a> --}}
        @endforeach
      </ul>
    </div>
  </div>
  
