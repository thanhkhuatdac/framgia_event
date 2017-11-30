$(document).ready(function () {
    $('#typing-search').bind('keyup', function () {
        event.preventDefault();
        if ($(this).val() == '') {
            $('#home-search-result').hide(400);
        } else {
            var keyword = $(this).val();
            var url = $('#typing-search').data('url-search');

            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: {
                    'keyword': keyword
                },
                success: function(result){
                    $('#home-search-result').show(400);
                    $('#home-search-result').html(result);
                },
                error: function (data) {
                    var errors = data.responseJSON.errors;
                    $.each( errors, function( key, value ) {
                        alertify.notify(value[0], 'error', 7, function() {

                        });
                    });
                }
            });
        }
    });
});
