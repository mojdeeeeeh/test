 @extends('layouts.main1')

 @section('content')

 <div class="content-wrapper">
 	<section class="content">

 		<!-- row -->
 		<div class="row">
 			<div class="col-md-12">
 				
				<form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<legend>
						<h1>Upload image</h1>
					</legend>
					<input type="file" name="userImage" id="file">
					<input type="submit" value="Upload" name="submit">
				</form>

			</div>
		</div>
	</section>
</div>
@endsection

@section('scripts')
@endsection

