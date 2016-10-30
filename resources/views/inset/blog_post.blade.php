<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ $post['title'] }}</h4>
    </div>
    <div class="panel-body">
        <div class="panel-title row">
            <div class="col-md-4">
                Written by: {{ $post['author'] }}
            </div>
            <div class="col-md-4 col-md-offset-4 text-right">
                <span>{{ $post['date']->format('m/d/Y H:i') }}</span>
            </div>
        </div>
        <div class="jumbotron">
            <div class="post-body-content">
                {!! $post['body'] !!}
            </div>
            <p><a class="btn btn-primary btn-lg" href="{{ $post['href'] }}" role="button">Learn more</a></p>
        </div>
    </div>
</div>