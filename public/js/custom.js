/**
 * Created by "Fabio Cigliano" on 30/10/16.
 */

/**
 * Show a confirm dialog actually deleting the selected BlogPost
 * @link http://bootboxjs.com/
 */
$('.btn-delete-post').click(function() {
    var $this = $(this);
    bootbox.confirm({
        message: "Are you sure do you want to remove this post?",
        backdrop: true,
        size: 'small',
        buttons: {
            cancel: {
                className: 'btn-danger',
                label: '<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"> </span> No'
            },
            confirm: {
                className: 'btn-success',
                label: '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> </span> Yes'
            }
        },
        callback: function(result) {
            if(result) {
                var post_id = $this.parents('.post').attr('post_id');
                console.log('Deleting post ' + post_id);
                if(post_id) {
                    window.location = '/post/delete/' + post_id;
                }
            }
        }
    });
});

$('.btn-edit-post').click(function() {
    var $this = $(this);
    var post_id = $this.parents('.post').attr('post_id');
    console.log('Editing post ' + post_id);
    if(post_id) {
        window.location = '/post/edit/' + post_id;
    }
});
