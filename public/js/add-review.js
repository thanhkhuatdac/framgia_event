$(document).ready(function() {
    $(".btn-add-review").bind('click', function(){
        event.preventDefault();
        var rate = $("#rate").val();
        var content = $("#content").val();
        var eventPlanId = $("#epId").val();
        $.ajax({
            url: '/event-plan/add-review/'+eventPlanId,
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
    var chanel = pusher.subscribe('review-chanel');
    chanel.bind('App\\Events\\ReviewEvent', addCommentPusher);
});

function addCommentPusher(data) {
    var reviewItem = data.review;
    var avgRate = data.avgRate;
    var countReviews = data.countReviews;

    $(".review-list").prepend(reviewItem);
    $("input.rating").rating();

    $("#avg-rate").html(avgRate);
    $("input#input-avg-rate").val(avgRate).rating();
    $("#count-reviews").html(countReviews);
}

