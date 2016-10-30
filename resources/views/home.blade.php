@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are
                    @if (Auth::guest())
                    NOT
                    @endif
                    logged in!
                    <br>
                    @if (Auth::guest())
                    You cannot publish posts as a guest user.
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-8 col-md-offset-2">
                @include('inset.blog_post')
            </div>
        @empty
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">We're sorry</div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <img src="images/ko.png" valign="middle" class="pull-left">
                    </div>
                    <div class="col-md-8">
                        No posts to show
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-8">
            @if (count($posts) !== 0 )
            See more posts...
            @endif
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
