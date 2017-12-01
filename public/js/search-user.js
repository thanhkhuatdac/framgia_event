$(document).ready(function () {
    $('#search-users').bind('keyup', function () {
        event.preventDefault();
        var keyword = $(this).val();
        var url = $('#search-users').data('url-search');

        $.ajax({
            url: url,
            type: 'get',
            async: false,
            data: {
                'keyword': keyword
            },
            success: function(result){
                $('#list-all-users').html(result);
            }
        });
    });
});
