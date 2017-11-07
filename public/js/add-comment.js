$(document).ready(function() {
    $(".btn-add-comment").bind('click', function() {
        event.preventDefault();
        var request_event_id = $("#request-event-id").val();
        var comment_content = $("#comment-content").val();
        $.ajax({
            url: '/request-event/add-comment/' + request_event_id,
            type: 'post',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'request_event_id': request_event_id,
                'comment_content': comment_content
            },
            success: function(result){
                $("#comment-content").val('');
                alertify.notify(result, 'success', 5, function() {

                });
            },
            error: function (data) {
                var errors = data.responseJSON.errors;
                $.each( errors, function( key, value ) {
                    alertify.notify(value[0], 'error', 7, function() {

                    });
                });
            }
        });
    });

    var pusher = new Pusher('6c0ea64bcf039f7c4c14', {
        cluster: 'ap1',
        encrypted: true
    });
    var chanelAddComment = pusher.subscribe('add-comment-chanel');
    chanelAddComment.bind('App\\Events\\CommentEvent', function(data) {
        var comment = data.comment;
        var commentsCount = data.commentsCount;

        $("#comments-count").html(commentsCount);
        $("#list-comment").prepend(comment);
    });
});
