$(document).ready(function() {
    $(".btn-add-review").bind('click', function(){
        event.preventDefault();
        var rate = $("#rate").val();
        var content = $("#content").val();
        var eventPlanId = $("#epId").val();
        $.ajax({
            url: '/event-plan/add-review/' + eventPlanId,
            type: 'post',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'rate': rate,
                'content': content,
                'eventPlanId': eventPlanId
            },
            success: function(result){
                $("#content").val('');
                $("#rate").val(0).rating();
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
    var chanelAddReview = pusher.subscribe('review-chanel');
    chanelAddReview.bind('App\\Events\\ReviewEvent', function(data) {
        var reviewItem = data.review;
        var avgRate = data.avgRate;
        var countReviews = data.countReviews;

        $(".review-list").prepend(reviewItem);
        $("input.rating").rating();

        $("#avg-rate").html(avgRate);
        $("input#input-avg-rate").val(avgRate).rating();
        $("#count-reviews").html(countReviews);

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
                    'from_chanel': '01'
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

        var chanelAddReply = pusher.subscribe('reply-review-chanel-01');
        chanelAddReply.bind('App\\Events\\ReplyReviewEvent01', function(data) {
            var reply_review = data.reply_review;
            var review_id = data.review_id;
            $("#replies-review-" + review_id).append(reply_review);
        });
    });

});
