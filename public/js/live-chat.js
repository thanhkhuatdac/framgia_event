$(document).ready(function ($) {

    var pusherKey = $('#sidebar-sticky').data('pusher-key');
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        encrypted: true
    });
    var chanelId = $('#customer').val() + $('#freelancer').val();

    $('#input-chat').bind('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();

            var url = $(this).data('send-message');
            var user = $(this).data('user-id');
            var content = $(this).val();

            if (content == '') {
                alertify.notify('You have not entered a message!', 'error', 7, function() {

                });
                return false;
            }
            sendMessage(user, url, content, chanelId);
            $(this).val('');
        }
    });

    var chanelLiveChat = pusher.subscribe('live-chat-' + chanelId);
    chanelLiveChat.bind('App\\Events\\ForkLiveChatEvent', function(data) {
        var user = data.user;
        var currentUser = $('#input-chat').data('user-id');

        if (user == currentUser) {
            var liTag = $("<li class='list-group-item message-me'></li><br>");
        } else {
            var liTag = $("<li class='list-group-item message-you'></li><br>");
        }

        liTag.html(data.content);
        $('#show-messages').append(liTag);
    });

});

function sendMessage (user, url, content, chanelId) {
    event.preventDefault();
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'user': user,
            'content': content,
            'chanelId': chanelId
        },
        success: function (result) {
            return true;
        }
    });
}
