function logout() {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
