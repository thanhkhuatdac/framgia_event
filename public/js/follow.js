$(document).ready(function() {
    $('#link-follow').bind('click', function() {
        event.preventDefault();
        var userFollowing = $('#link-follow').data('user-following');
        var userFollower = $('#link-follow').data('user-follower');
        var url = this.href;
        if (!userFollowing || !userFollower || !url) {
            alertify.notify('Error', 'error', 7, function() {
                //
            });
        }
        $.ajax({
            url: url,
            type: 'get',
            async: false,
            data: {
                'userFollowing': userFollowing,
                'userFollower': userFollower
            },
            success: function(result){
                $("#link-follow").hide();
                $("#link-unfollow").show();
                alertify.notify(result, 'success', 5, function() {
                    //
                });
            }
        });
    });

    $('#link-unfollow').bind('click', function() {
        event.preventDefault();
        var userFollowing = $('#link-unfollow').data('user-following');
        var userFollower = $('#link-unfollow').data('user-follower');
        var url = this.href;
        if (!userFollowing || !userFollower || !url) {
            alertify.notify('Error', 'error', 7, function() {
                //
            });
        }
        $.ajax({
            url: url,
            type: 'get',
            async: false,
            data: {
                'userFollowing': userFollowing,
                'userFollower': userFollower
            },
            success: function(result){
                $("#link-follow").show();
                $("#link-unfollow").hide();
                alertify.notify(result, 'success', 5, function() {
                    //
                });
            }
        });
    });
});
