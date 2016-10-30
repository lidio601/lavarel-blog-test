<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ $post['title'] }}</h4>
        <div class="panel-title text-right">
            <span>{{ $post['date'] }}</span>
        </div>
    </div>
    <div class="panel-body">
        <div class="jumbotron">
            <div class="post-body-content">
                {!! $post['body'] !!}
            </div>
            <p><a class="btn btn-primary btn-lg" href="{{ $post['href'] }}" role="button">Learn more</a></p>
        </div>
    </div>
</div>