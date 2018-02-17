@extends('layouts.main1')

@section('content')

<div class="content-wrapper">
   <section class="content">
      <div class="row">
      	<div class="col-md-6">
{{--       		@foreach ($photos as $photo)
      			<img src="{{ $photos->path }}" alt="">
      		@endforeach --}}
      	</div>
      	<div class="col-md-6">

           {{-- <input type="file" name=""> --}}
         {{--   		  <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="file" name="image" />
        <input type="submit" value="Send photo" />
    </form> --}}
<form action=action='{{ url("photos") }}' method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
     <label for="photo">File input</label>
     <input type="file" id="photo" name="photo">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

  <div>
          salam
        </div>
           </div>
        </div>
      
    </section>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script type="text/javascript">

Dropzone.options.addPhotosForm = {
  paramName: "photo", // The name that will be used to transfer the file
  maxFilesize: 3, // MB
  acceptedFile: '.jpg, .jpeg, .png, .bmp'
};

</script>
@endsection





{{-- <html>
<head>
	<title>Laravel5.4 - Image upload with validation</title>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<h1>File Upload</h1>
			<form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
				<label>Select image to upload:</label>
				<input type="hidden" value="{{ csrf_token() }}" name="_token">
				<input type="file" name="image" id="file">
				@if ($errors->has('image'))
	            	<span class="help-block">
	                	<strong>{{ $errors->first('image') }}</strong>
	            	</span>
	        	@endif
				<input type="submit" value="Upload" name="submit">
			</form>
		</div>
	</div>
</body>
</html> --}}
