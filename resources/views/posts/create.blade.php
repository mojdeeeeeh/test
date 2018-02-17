

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
                  <h3 class="box-title">Create Post</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <form  action="{{ route('posts.store') }}" method="post" class="row">
                     {{ csrf_field() }}
                     <!-- text input -->
                    <div class="form-group {{ $errors->has('title') ? "has-error" : "" }}" style="padding: 10px">
                     <label>title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter ..." value="{{ old('title', '') }}" />
                    </div>
                    <div class="form-group {{ $errors->has('brief') ? "has-error" : "" }}" style="padding: 10px">
                       <label>brief</label>
                         <input id="brief" name="brief" class="form-control"  placeholder="Enter ..." value="{{ old('brief', '') }}" />
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
                            <div class="form-group{{ $errors->has('body') ? "has-error" : "" }}" style="padding: 10px">
                              <label for="bodyTextArea">body</label>
                                <div>
                                  <textarea id="bodyTextArea" name="body" class="ckeditor">{!! old('body', '') !!}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                 
                  <!-- tag -->
                    <div class="row" style="padding: 10px">
                      <div class="col-md-12">
                        <label>Tags</label>
                        <input type="text" value="{{ old('tags', '') }}" name="tags" class="form-control tagsinput" data-role="tagsinput" data-color="info" />
                      </div>
                    </div>
                    <div class="form-group col-md-offset-5" style="padding: 10px">
                      <button type="submit" class="btn btn-primary">Add note</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div> 
@endsection

@section('scripts')
    <script type="text/javascript">

    CKEDITOR.replace( 'bodyTextArea', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );
</script>
@endsection

