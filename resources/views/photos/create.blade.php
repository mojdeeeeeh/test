@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body">
                <!-- form start -->
                <form action='{{ url("upload/gallery") }}' method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <legend>
                      <h1>Upload image</h1>
                    </legend>
                   
                    <div class="form-group">
                        <input type="file" name="userImage" id="file" />
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" value="Upload" />
                    </div>               
                </form>
            </div>              
          </div>
        </div>


        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="box-header with-border">
                <h3 class="box-title">gallery</h3>
              </div>
            {{-- <img class="profile-user-img img-responsive img-circle" src="{{ '/storage/' . Auth::user()->getImage() }}" alt="User profile picture"> --}} 
            </div>
          </div>
          <!-- /.box -->
        </div>
    </section>
  </div>

@endsection
{{--  --}}
