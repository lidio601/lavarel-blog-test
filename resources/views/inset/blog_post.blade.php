<div class="panel panel-default post" post_id="{{ $post['_id'] }}">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">
                <h4><?php echo e($post['title']); ?></h4>
            </div>
            <?php if(!Auth::guest()): ?>
            <div class="col-md-4 text-right">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary btn-edit-post"><span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Edit</button>
                    <button type="button" class="btn btn-danger btn-delete-post"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></span> Delete</button>
                </div>
            </div>
            <?php endif; ?>
        </div>
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
        <div class="post-body-content">
            <div class="jumbotron">
                {!! $post['body'] !!}
            </div>
            <p><a class="btn btn-primary btn-lg" href="{{ $post['href'] }}" role="button">Learn more</a></p>
        </div>
    </div>
</div>