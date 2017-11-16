$(document).ready(function () {
    var pusherKey = $('#sidebar-sticky').data('pusher-key');
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        encrypted: true
    });

    $('.fork-service>a').bind('click', function () {
        event.preventDefault();
        var url = $('#' + this.id).data('url');
        var forkServiceId = this.id;

        $.ajax({
            url: url,
            type: 'post',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'forkServiceId': forkServiceId
            },
            success: function(result){
                alertify.notify(result['message'], 'success', 5, function() {
                    //
                });
                var urlLoadDetail = $('#detail-amount-' + result['forkDetailId']).data('url-refresh');
                var urlLoadEvent = $('#event-fork-amount-' + result['forkEventId']).data('url-refresh');

                loadForkDetailAmount(urlLoadDetail, result['forkDetailId']);
                loadEventForkAmount(urlLoadEvent, result['forkEventId']);
            }
        });
    });

    $('.link-add-fork-service>a').bind('click', function () {
        var id = this.id;
        $('#inputs-add-fork-service-' + id).toggle(400);
        $('#inputs-add-fork-service-' + id).find('button').bind('click', function () {
            var serviceName = $('#inputs-add-fork-service-' + id).find('input[name="name"]');
            var servicePrice = $('#inputs-add-fork-service-' + id).find('input[name="price"]');
            var url = $('#inputs-add-fork-service-' + id).data('url-add');

            $.ajax({
                url: url,
                type: 'post',
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'serviceName': serviceName.val(),
                    'servicePrice': servicePrice.val(),
                    'forkDetailId': id
                },
                success: function (result) {
                    alertify.notify(result['message'], 'success', 5, function() {
                        //
                    });
                    serviceName.val('');
                    servicePrice.val('');

                    var urlLoadDetail = $('#detail-amount-' + result['forkDetailId']).data('url-refresh');
                    var urlLoadEvent = $('#event-fork-amount-' + result['forkEventId']).data('url-refresh');

                    loadForkDetailAmount(urlLoadDetail, result['forkDetailId']);
                    loadEventForkAmount(urlLoadEvent, result['forkEventId']);
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

    var chanelRemoveService = pusher.subscribe('fork-remove-service');
    chanelRemoveService.bind('App\\Events\\ForkRemoveServiceEvent', function(data) {
        var forkServiceId = data.forkServiceId;
        $('#fork-service-' + forkServiceId).remove();
    });

    var chanelAddService = pusher.subscribe('fork-add-service');
    chanelAddService.bind('App\\Events\\ForkAddServiceEvent', function(data) {
        var serviceItem = data.serviceItem;
        var forkDetailId = data.forkDetailId;

        $('#show-services-of-detail-' + forkDetailId).append(serviceItem);
        $('.fork-service>a').bind('click', function () {
            event.preventDefault();
            var url = $('#' + this.id).data('url');
            var forkServiceId = this.id;

            $.ajax({
                url: url,
                type: 'post',
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'forkServiceId': forkServiceId
                },
                success: function(result){
                    alertify.notify(result['message'], 'success', 5, function() {
                        //
                    });
                    var urlLoadDetail = $('#detail-amount-' + result['forkDetailId']).data('url-refresh');
                    var urlLoadEvent = $('#event-fork-amount-' + result['forkEventId']).data('url-refresh');

                    loadForkDetailAmount(urlLoadDetail, result['forkDetailId']);
                    loadEventForkAmount(urlLoadEvent, result['forkEventId']);
                }
            });
        });
    });

    var chanelLoadDetailAmount = pusher.subscribe('load-detail-amount');
    chanelLoadDetailAmount.bind('App\\Events\\ForkLoadDetailAmountEvent', function(data) {
        var detailAmount = data.detailAmount;
        var forkDetailId = data.forkDetailId;

        $('#detail-amount-' + forkDetailId).html(detailAmount);
    });

    var chanelLoadEventAmount = pusher.subscribe('load-event-amount');
    chanelLoadEventAmount.bind('App\\Events\\ForkLoadEventAmountEvent', function(data) {
        var eventAmount = data.eventAmount;
        var eventForkId = data.eventForkId;

        $('#event-fork-amount-' + eventForkId).html(eventAmount);
    });
});

function loadForkDetailAmount (url, forkDetailId) {
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'forkDetailId': forkDetailId
        },
        success: function(result){
            return true;
        }
    });
}

function loadEventForkAmount (url, eventForkId) {
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'eventForkId': eventForkId
        },
        success: function(result){
            return true;
        }
    });
}
