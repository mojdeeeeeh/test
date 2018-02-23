@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ '/storage/' . Auth::user()->getImage() }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::user()->email }}</p>
              <hr/>

              <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
 

      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Profile</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <!-- form start -->
                <form action='{{ url("upload/user") }}' method="post" enctype="multipart/form-data">
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
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

@endsection
