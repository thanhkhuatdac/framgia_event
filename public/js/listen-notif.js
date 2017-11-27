$(document).ready(function () {
    $('#notif-count').hide();
    $('#show-notif').bind('click', function () {
        $('#list-notif').toggle(400);
    });

    var pusherKey = $('#realtime').data('pusher-key');
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        encrypted: true
    });

    var notif_array = new Array();
    var chanelListenNotif = pusher.subscribe('approve-event-plans');
    chanelListenNotif.bind('App\\Events\\ApproveEvent', function(data) {
        var userId = data.userId;
        var notif = data.notif;

        var currentUserId = $('#realtime-user').data('current-id');

        if (currentUserId == userId) {
            notif_array.push(notif);
            var count_notif = notif_array.length;

            $('#list-notif').prepend(notif);
            $('#notif-count').show().html(count_notif);
        }
    });
});
