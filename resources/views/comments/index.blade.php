    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Posts</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        
        <div class="row">
          @foreach ($posts as $post)
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="/posts/{{ $post->id }}"><i class="fa fa-file-text-o"></i></a></div>
              <h4 class="title"><a href="/posts/{{ $post->id }}"> {{ $post->title }} </a></h4>
              <p class="description">
                {!! \Illuminate\Support\Str::limit($post->brief, 100,'....')  !!}</p>
            </div>
          </div>
          @endforeach
        </div>

       {{ $posts->links() }}

      </div>
    </section>
