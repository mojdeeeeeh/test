@extends('layouts.main2')

@section('content')

 <section id="hero" style="height: 90px">
        <div class="hero-container" >
        </div>
    </section><!-- #hero -->


<section id="about">
<div class="container f-byekan">
    <div class="row about-container">

        <div class=" col-lg-6 content order-lg-1 order-2 post-container">
            <h2 class="title">
                {{ $post->title }}
            </h2>
            <p>
                {!! html_entity_decode(  $post->body ) !!}
            </p>
            <div >
            @unless($post->tags->isEmpty())
                     <ul>
                        Tag:
                        @foreach ($post->tags as $tag)
                        <li class="tag label label-info">{{ $tag->value }}</li>
                        @endforeach
                     </ul>
            @endunless
            </div>

            <div style="text-align: center;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                    add comment
                </button>
            </div>
    </div>
        <div class="col-lg-6 content order-lg-1 order-2" style="padding-top: 60px">

        @if (sizeof($post->comments) == 0)
            <h3 class="align-center f-byekan">
                نظری ثبت نشده است
            </h3>
        @else
            @foreach($post->comments as $comment)
                <div class="icon-box wow fadeInUp">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>

                    <h4 class="title">
                        {{ $comment->cmName }}
                    </h4>
                    
                    <p class="description">
                        {{ $comment->cmBody }}
                    </p>
                    
                    <label class="pull-right small">
                        {{ $comment->created_at->diffForHumans() }}
                    </label>
                    
                </div>
                 @auth
                        <a href="javascript:void(0)" class="text-danger pull-right"
                            data-record-id="{{ $comment->id }}" onclick="deleteRecord(event)">
                            Delete
                        </a>
                    @endauth
                <hr>
            @endforeach
        @endif
    </div>
 </div>
</div>
</section>


         <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog "  style="z-index: 999!@important;">

                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header">
                             
                                <h4 class="modal-title">Add comment</h4>
                        </div>

                        <div class="modal-body">

                                <form id="app" action='{{ url("posts/$post->id/comments") }}' method="post" class="row">
                                        {{ csrf_field()  }}

                                        <div class="form-group col-md-12">
                                                <label for="cmBody">comment</label>
                                                <div>
                                                        <textarea id="cmBody" name="cmBody" class="form-control"></textarea>
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label for="cmName">Name</label>
                                                <div>
                                                        <input type="text" id="cmName" name="cmName" class="form-control">
                                                </div>
                                        </div>

                                     <div class="form-group col-md-6">
                                                <label for="cmEmail">Email</label>
                                                <div>
                                                        <input type="text" id="cmEmail" name="cmEmail" class="form-control">
                                                </div>
                                        </div>
            
                                        <div style="padding-left: 30%">
                                                <input type="submit" value="Send" class="btn btn-primary ">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                </form>
                        </div>
                </div>

        </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script type="text/javascript">
        function deleteRecord(e){
            e.preventDefault();

            let canDelete = confirm('Are you sure to delete record?');

            if (! canDelete)
            {
                return false;
            }

            let recordId = e.target.getAttribute('data-record-id');
            let path = '{{ url('/comments/') }}' + '/' + recordId;

             axios.delete(path)
                 .then(function(res){
                    location.reload();
                 })
                 .catch(function(err){
                    alert(err.message);
                 });

            return false;
        }
</script>

@endsection
