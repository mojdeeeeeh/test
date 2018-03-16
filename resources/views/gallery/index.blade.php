@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
   <section class="content">
      <!-- row -->
      <div class="row">
         <div class="col-md-12">
            <div>
               <a href="{{ route('galleries.create') }}">
               New Gallery
               </a>
            </div>

            <ul class="gallery row">
               @if (sizeof($galleries) > 0)

               @foreach($galleries as $gallery)
               <li class="gallery-item col-md-4">
                  <a href="/galleries/{{ $gallery->id }}/photos">
                     <img src="{{ '/storage/' . $gallery->getImage() }}"
                        alt="Gallery image" class="col-md-offset-1 col-md-10" />
                     <h5 class="text-center">{{ $gallery->title }}</h5>
                  </a>
                  <div class="timeline-footer">
                     <a href="#" class="btn btn-danger" onclick="deleteRecord({{ $gallery->id }})"> Delete</a>
                     <a href="{{ url("/galleries/$gallery->id/edit") }}" class="btn btn-primary">Modify</a>
                  </div>
               </li>
               @endforeach

               @else
               <h3>No gallery registered</h3>
               @endif

            </ul>
            {{ $galleries->links() }}
         </div>
      </div>
      
   </section>
</div>


     
@endsection

@section('scripts')
<script type="text/javascript">
   function deleteRecord(id){
      if(confirm('are you sure?'))
      {
         let path = "/galleries/" + id;

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

