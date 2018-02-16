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
         <div class="col-md-offset-2 col-md-8">
            <!-- general form elements disabled -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Create Tag</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <form  action="{{ route('tags.store') }}" method="post" class="row">
                     {{ csrf_field() }}
                     <!-- text input -->
                  <div class="form-group {{ $errors->has('value') ? "has-error" : "" }}" style="padding: 10px">
                     <label>value</label>
                     <input type="text" id="value" name="value" class="form-control" placeholder="Enter ..."  required="true" />
                  </div>
                <div class="form-group col-md-offset-5" style="padding: 10px">
                <button type="submit" class="btn btn-primary">Add Tag</button>
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


