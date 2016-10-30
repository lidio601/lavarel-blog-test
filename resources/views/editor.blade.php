@extends('layouts.app');

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Post Editor</div>

                <div class="panel-body">
                    Hi {{Auth::user()->name}},
                    here you can edit and publish a new Post for your blog!
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-1">
        <form id="postform" action="/post/save">
            {{ csrf_field() }}
            <input name="_id" type="hidden" required="" value="{{$post->_id or ''}}">
            <h3 class="box-title m-b-20">
                {{ isset($post->_id) ? 'Edit Post ' . $post->_id : 'Create a New Post' }}
            </h3>
            <div class="form-group">
                <input name="title" class="form-control" type="text" required="" placeholder="Title" value="{{$post->title or ''}}">
            </div>
            <div class="form-group">
                <div class="blog-post-body">{!! $post->body or '<p>Empty =(</p>' !!}</div>
                <input name="body" type="hidden" required="" value="{{$post->body or ''}}">
            </div>
            <div class="form-group">
                <input name="href" class="form-control" type="text" required="" placeholder="Reference Link" value="{{$post->href or ''}}">
            </div>
            <div class="form-group text-center m-t-20">
                <button class="btn btn-success btn-block text-uppercase" type="submit">Save Post</button>
            </div>
            <div class="form-group m-b-0 col-sm-12 ">
                <div class="text-center">
                    <br><p>Otherwise <a href="/home" class="text-primary m-l-5"><b>Go Back</b></a></p>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script_inset')
    <!-- @see http://summernote.org/getting-started/#simple-example -->
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('.blog-post-body').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                  // set focus to editable area after initializing summernote
            });
        });

        $('#postform').submit(function(e) {
            $('input[name="body"]').val($('.blog-post-body').summernote('code').replace("\"", "\\\""));
        });
    </script>
@endsection