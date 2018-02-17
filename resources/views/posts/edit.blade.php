@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         @if(count($errors))
         <div class="box-body">
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               <span data-notify="message">
                  <ul>
                     @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </span>
            </div>
         </div>
         @endif
         <!-- right column -->
         <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Post</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div>
                     <a href="{{ route('posts.index') }}" class="btn btn-info">back</a>
                  </div>
               
                  <form method="POST" action='{{ url("posts/$post->id") }}' class="form-horizontal">
                     {{method_field('PATCH')}}
                     {{ csrf_field() }}
                  <!-- text input -->
                     <div class="form-group {{ $errors->has('title') ? "has-error" : "" }}" style="padding: 10px">
                        <label>title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" />
                     </div>
                     <div class="form-group {{ $errors->has('brief') ? "has-error" : "" }}" style="padding: 10px">
                        <label>brief</label>
                     <input id="brief" name="brief" class="form-control" value="{{ $post->brief }}" />
                     </div>
                     <div class="form-group {{ $errors->has('body') ? "has-error" : "" }}" style="padding: 10px">
                        <label>body</label>
                        <section class="content">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="box box-info">
                                    <div class="box-header">
                                       <h3 class="box-title">type...</h3>
                                       <!-- tools box -->
                                       <div class="pull-right box-tools">
                                          <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                           <i class="fa fa-minus"></i></button>
                                       </div>
                                       <!-- /. tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body pad">
                                       <textarea id="editor1" name="body" rows="10" cols="80" class="ckeditor">
                                       {{ $post->body }}   
                                       </textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Tags</label>
                           <input type="text" value="{{ old('tags', $tags) }}" name="tags" class="form-control tagsinput" data-role="tagsinput" data-color="info" />
                           </div>
                        </div>
                        <div class="form-group " style="padding: 10px">
                           <button type="submit" class="btn btn-primary col-md-offset-5">Edit note</button>
                        </div>
                     </form>

                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
         </div>
      <!-- /.row -->
      </section>
      <!-- /.content -->
   </div>
@endsection

@section('scripts')
<script>
   var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
   };
   CKEDITOR.replace( 'editor1', options );
   $('.textarea').wysihtml5()
   
   ClassicEditor
       .create( document.querySelector( '#body' ) )
       .catch( error => {
           console.error( error );
       } );
</script>
@endsection

