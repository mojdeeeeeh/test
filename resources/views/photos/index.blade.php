 @extends('layouts.main1') @section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div style="padding-left: 30px;">
                <a href="{{ route('photos.create', $gallery->id) }}">
                    New photo
                </a>
            </div>
            <div class="col-md-12 text-center">
                <h1>
                    {{ $gallery->title }}
                </h1>
            </div>
            @foreach ($gallery->photos as $photo)
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('storage/' . $photo->getImage()) }}" alt="photos" style="width:100%" />
                        <div class="caption">
                            <p>{{ $photo->title }}</p>
                        </div>
                    </a>
                    
                    <div class="timeline-footer">
                        <a href="#" class="btn btn-danger" onclick="deleteRecord({{ $photo->id }})"> Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
function deleteRecord(id) {
    if (confirm('are you sure?')) {
        let path = '{{ url("/galleries/$gallery->id/photos") }}' + '/' + id;

        axios.delete(path)
            .then(function(res) {
                location.reload();
            })
            .catch(function(res) {
                alert(res.message);
            });
    }
}
</script>
@endsection
