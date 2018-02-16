@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         
               <div class="box-body">
                  <form  action="{{ route('posts.store') }}" method="post" class="row">
                     {{ csrf_field() }}
                     <!-- text input -->
                     <div class="form-group {{ $errors->has('title') ? "has-error" : "" }}" style="padding: 10px">
                     <label>title</label>
                     <input type="text" id="title" name="title" class="form-control" placeholder="Enter ..." value="{{ old('title', '') }}" />
               </div>
               
             <!-- tag -->
            <div class="row" style="padding: 10px">
            <div class="col-md-12">
            <label>Tags</label>
            <input type="text" value="{{ old('tags', '') }}" name="tags" class="form-control tagsinput" data-role="tagsinput" />
            </div>
            </div>
        
            <div class="form-group col-md-offset-5" style="padding: 10px">
            <button type="submit" class="btn btn-primary">Add note</button>
            </div>
          </form>
        </div>
      </div>
    </section>
</div>

@endsection


