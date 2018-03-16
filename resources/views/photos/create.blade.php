 @extends('layouts.main1')

 @section('content')
<div class="content-wrapper">

    <section class="content">
        <h1>
            {{ $gallery->title }}
        </h1>

      <div class="row">
        <!-- left column -->
          <div class="col-md-offset-2 col-md-8">
            <!-- general form elements disabled -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Photo</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('photos.store', $gallery->id) }}"
                        method="post" enctype="multipart/form-data">

              {{ csrf_field() }}

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputTitle">Photo title</label>
                  <input type="text" name="title" value=""
                        class="form-control col-md-5" placeholder="Photo title" />
                </div>
               
                <div class="form-group">
                  <label for="exampleInputFile">Image input</label>
                  <input type="file" name="image"  />
                </div>

                <div class="form-group">
                    <input type="submit" value="Create" />
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


