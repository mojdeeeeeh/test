@extends('layouts.main1')
@section('content')


<div class="content-wrapper">
  
    <section class="content">

     <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Tags</h3>
            </div>
            <div class="widget-user-image">
               <div class="icon"><i class="fa fa-tags fa-3x text-white" style="color:White"></i></div>
            </div>
            <div class="box-footer no-padding">
              <table class="table table-hover">
                     <thead>
                        <th class="col-md-10">value</th>
                        <th class="col-md-2"></th>
                     </thead>
                     <tbody>
                        @foreach ($tags as $tag)
                        <tr>
                           <td> {{ $tag->value }} </td>
                           <td>
                              <a href="#" class="btn btn-danger" onclick="deleteRecord({{ $tag->id }})"> Delete</a>
                              <a href="{{ url("/tags/$tag->id/edit") }}" class="btn btn-primary">Modify</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{ $tags->links() }}

            </div>
          </div>
          <!-- /.widget-user -->
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
         let path = "/tags/" + id;
   
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

