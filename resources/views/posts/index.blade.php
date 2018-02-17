 @extends('layouts.main1')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 {{--    <section class="content-header">
      <h1>
        Timeline
        <small>example</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section> --}}
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    Posts...
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
              @foreach ($posts as $post)
            <li>
              <i class="fa fa-edit bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>  <label >{{ $post->created_at->diffForHumans() }}  </label></span>

                <h3 class="timeline-header"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>

                <div class="timeline-body">
                  {{ $post->brief }}
                </div>
                <div class="timeline-footer">
                 <a href="#" class="btn btn-danger" onclick="deleteRecord({{ $post->id }})"> Delete</a>
                 <a href="{{ url("/posts/$post->id/edit") }}" class="btn btn-primary">Modify</a>
                </div>
              </div>
            </li>
             @endforeach
          </ul>
        </div>
      </div>
    </section>
    <div style="padding-left: 75px">

      {{ $posts->links() }}

    </div>
              
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
   function deleteRecord(id){
      if(confirm('are you sure?'))
      {
         let path = "/posts/" + id;

         axios.delete(path)
         .then(function(res){
            location.reload();
         })
         .catch(function(res){
            alert(rest.message);
         });
      }
 }
</script>

@endsection

