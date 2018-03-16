@extends('layouts.main1')

@section('content')
<div class="content-wrapper">
<section class="content">
   <div class="row">
      <!-- left column -->
      <div class="col-md-offset-2 col-md-8">
         <!-- general form elements disabled -->
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Change Gallery</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div>
                  <a href="{{ route('galleries.index') }}" class="btn btn-info">back</a>
               </div>

               <!-- form start -->
               <form class="form-horizontal" action="{{ route('galleries.update',$gallery->id) }}"
                  method="post" enctype="multipart/form-data">
                  {{method_field('PATCH')}}
                  {{ csrf_field() }}
                  <div class="box-body">
                     <div class="form-group">
                        <label for="exampleInputTitle">Gallery title</label>
                        <input type="text" name="title" value="{{ $gallery->title }}"
                           class="form-control col-md-5" placeholder="Gallery title" />
                     </div>
                    <div class="row">
                        <div class="float-center ">
                            <center><img src="{{ '/storage/' . $gallery->getImage() }}"
                         alt="Gallery image" class="img-thumbnail image-edit" /></center>
                        </div> 
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Image input</label>
                        <input type="file" name="image" value="{{ $gallery->extra['image_path'] }}" />
                     </div>
                     <div class="form-group">
                        <input type="submit" value="update" />
                     </div>
                  </div>
                  <!-- /.box-body -->
               </form>

            </div>
         </div>
      </div>
</section>
</div>
@endsection
@section('scripts')
@endsection

