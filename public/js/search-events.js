$(document).ready(function() {
    $('#autocompleteTagging').on('keyup', function() {
        event.preventDefault();
        var keyword = $('#autocompleteTagging').val();
        var url = $('#autocompleteTagging').data('url');
        $.ajax({
            url: url,
            type: 'post',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'keyword': keyword
            },
            success: function(result){
                $('#search-result').html(result);
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
});
