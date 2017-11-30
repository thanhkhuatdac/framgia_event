$(document).ready(function () {
    var pusherKey = $('#realtime').data('pusher-key');
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        encrypted: true
    });
    var currentUserId = $('#realtime-user').data('current-id');
    var userOnlineArray = new Array();

    //User Online
    var urlLoadUserOnline = $('#list-users-online').data('load-user-online');
    loadUserAccess(urlLoadUserOnline, currentUserId);

    var chanelLoadUserOnline = pusher.subscribe('channel-load-user-online');
    chanelLoadUserOnline.bind('App\\Events\\LoadUserOnline', function(data) {
        var user = data.userOnline;
        var userId = data.userOnlineId;

        if (userOnlineArray.indexOf(userId) == -1) {
            $('#list-users-online').append(user);
            userOnlineArray.push(userId);
        }
    });

    //User Offline
    var urlLoadUserOffline = $('#list-users-online').data('load-user-offline');
    $(window).bind('beforeunload', function(){
        userLeavePage(urlLoadUserOffline, currentUserId);
        removeTyping(currentUserId, urlRemoveTyping);
    });

    var chanelLoadUserOffline = pusher.subscribe('channel-load-user-offline');
    chanelLoadUserOffline.bind('App\\Events\\LoadUserOffline', function(data) {
        var userOfflineId = data.userOfflineId;
        var locationId = userOnlineArray.indexOf(userOfflineId);

        $('#user-online-' + userOfflineId).remove();
        userOnlineArray.splice(locationId, 1);
    });

    //Send messages
    var urlSendMessage = $('#box-chat-room-frm').data('send-message');
    $('#chat-room-content').bind('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var content = $(this).val();

            if (content == '') {
                alertify.notify('You have not entered a message!', 'error', 7, function() {

                });
                return false;
            }
            sendMessage (currentUserId, urlSendMessage, content);
            removeTyping(currentUserId, urlRemoveTyping);
            $(this).val('');
        }
    });

    $('#btn-send-message').bind('click', function () {
        event.preventDefault();
        var content = $('#chat-room-content').val();

        if (content == '') {
            alertify.notify('You have not entered a message!', 'error', 7, function() {

            });
            return false;
        }
        sendMessage (currentUserId, urlSendMessage, content);
        removeTyping(currentUserId, urlRemoveTyping);
        $('#chat-room-content').val('');
    });

    var chanelChatRoomMessage = pusher.subscribe('channel-chat-room-message');
    chanelChatRoomMessage.bind('App\\Events\\ChatRoomMessage', function(data) {
        var userChatId = data.userChatId;

        if (userChatId == currentUserId) {
            var liTag = $("<li class='list-group-item chat-room-message-me'></li><br>");
        } else {
            var liTag = $("<li class='list-group-item chat-room-message-you'></li><br>");
        }

        liTag.html(data.message);
        $('#show-messages-chat-room').append(liTag);
    });

    //Load Typing
    var urlLoadTyping = $('#box-chat-room-frm').data('load-typing');
    $('#chat-room-content').bind('click', function () {
        event.preventDefault();
        setTimeout(function(){
            loadTyping (currentUserId, urlLoadTyping);
        }, 1000);
    });

    var chanelLoadTyping = pusher.subscribe('channel-load-typing');
    chanelLoadTyping.bind('App\\Events\\LoadTyping', function(data) {
        var userTypingId = data.userId;
        var image = data.image;
        var imageExists = $('#show-messages-chat-room').find('.typing-image');

        if (userTypingId != currentUserId && imageExists.length == 0) {
            $('#show-messages-chat-room').append(image);
        }
    });

    //Remove Typing
    var urlRemoveTyping = $('#box-chat-room-frm').data('remove-typing');
    $('#chat-room-content').bind('blur', function () {
        event.preventDefault();
        setTimeout(function(){
            removeTyping(currentUserId, urlRemoveTyping);
        }, 1000);
    });

    var chanelRemoveTyping = pusher.subscribe('channel-remove-typing');
    chanelRemoveTyping.bind('App\\Events\\RemoveTyping', function(data) {
        var userRemoveTypingId = data.userId;
        var imageExists = $('#show-messages-chat-room').find('#typing-image-' + userRemoveTypingId);

        if (userRemoveTypingId != currentUserId && imageExists.length > 0) {
            $('#typing-image-' + userRemoveTypingId).remove();
        }
    });
});

function loadUserAccess (url, userId) {
    event.preventDefault();
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            'userId': userId
        },
        success: function (result) {
            return true;
        }
    });
}

function userLeavePage (url, userId) {
    event.preventDefault();
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            'userId': userId
        },
        success: function (result) {
            return true;
        }
    });
}

function sendMessage (userId, url, content) {
    event.preventDefault();
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            'userId': userId,
            'content': content
        },
        success: function (result) {
            return true;
        }
    });
}

function loadTyping (userId, url) {
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            'userId': userId
        },
        success: function (result) {
            return true;
        }
    });
}

function removeTyping (userId, url) {
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            'userId': userId
        },
        success: function (result) {
            return true;
        }
    });
}
