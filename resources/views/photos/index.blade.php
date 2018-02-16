 @extends('layouts.main1')

 @section('content')

 <div class="content-wrapper">
 	<section class="content">

 		<!-- row -->
 		<div class="row">
 			<div class="col-md-12">

 				{{-- <form action="{{ route('photos.store') }}" method="POST">
 					{{ csrf_field() }}

					<input type="file" name="image" required />

					<button type="submit">Send photo</button>
 				</form> --}}
 				<h1>File Upload</h1>
				<form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label>Select image to upload:</label>
				    <input type="file" name="file" id="file">
				    <input type="submit" value="Upload" name="submit">
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
				</form>

 			</div>
 		</div>
 	</section>
 </div>
 @endsection

 @section('scripts')
 @endsection

