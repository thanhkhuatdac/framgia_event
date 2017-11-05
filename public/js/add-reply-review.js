$(document).ready(function() {
    $(".link-reply>a").bind('click', function() {
        event.preventDefault();
        $("#frm-reply-" + this.id).show(400);
    });

    $(".btn-submit-reply>button").on('click', function() {
        event.preventDefault();
        var review_id = $("#input-review-id-" + this.id).val();
        var content = $("#rep-content-" + this.id).val();
        $.ajax({
            url: '/event-plan/reply-review/' + review_id,
            type: 'post',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'review_id': review_id,
                'content': content,
                'from_chanel': '02'
            },
            success: function(result){
                $(".content-reply>textarea").val('');
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
    var chanelAddReply = pusher.subscribe('reply-review-chanel-02');
    chanelAddReply.bind('App\\Events\\ReplyReviewEvent02', function(data) {
        var reply_review = data.reply_review;
        var review_id = data.review_id;

        $("#replies-review-" + review_id).append(reply_review);
    });
});
