function logout() {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#header-chat-room-notif').bind('click', function () {
    event.preventDefault();
    alertify.notify('Sẽ được trải nghiệm tính năng này khi có tài khoản!', 'error', 5, function() {
        //
    });
});
