$(document).ready(function ($) {
    $('#event-fork-start-date').datetimepicker();
    $('#event-fork-due-date').datetimepicker({
        useCurrent: false
    });
    $('#event-fork-start-date').on('dp.change', function (e) {
        $('#event-fork-due-date').data('DateTimePicker').minDate(e.date);
    });
    $('#event-fork-due-date').on('dp.change', function (e) {
        $('#event-fork-start-date').data('DateTimePicker').maxDate(e.date);
    });
    $('.fork-detail-start-date').each(function (index) {
        $('#' + $(this).attr('id')).datetimepicker();
    });
    $('.fork-detail-due-date').each(function (index) {
        $('#' + $(this).attr('id')).datetimepicker({
            useCurrent: false
        });
    });

    var pusherKey = $('#sidebar-sticky').data('pusher-key');
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        encrypted: true
    });

    $('#event-fork-start-date').on('click', function () {
        clickElement(this.id);
    });
    $('#event-fork-start-date').bind('blur', function () {
        losesFocusElement(this.id);
        changedData(this.id);
    });

    $('#event-fork-due-date').on('click', function () {
        clickElement(this.id);
    });
    $('#event-fork-due-date').bind('blur', function () {
        losesFocusElement(this.id);
        changedData(this.id);
    });

    $('.fork-detail-name').each(function (index) {
        $('#' + $(this).attr('id')).on('click', function () {
            clickElement(this.id);
        });
        $('#' + $(this).attr('id')).bind('blur', function () {
            losesFocusElement(this.id);
            changedData(this.id);
        });
    });
    $('.fork-detail-start-date').each(function (index) {
        $('#' + $(this).attr('id')).on('click', function () {
            clickElement(this.id);
        });
        $('#' + $(this).attr('id')).bind('blur', function () {
            losesFocusElement(this.id);
            changedData(this.id);
        });
    });
    $('.fork-detail-due-date').each(function (index) {
        $('#' + $(this).attr('id')).on('click', function () {
            clickElement(this.id);
        });
        $('#' + $(this).attr('id')).bind('blur', function () {
            losesFocusElement(this.id);
            changedData(this.id);
        });
    });


    var chanelClickElement = pusher.subscribe('click-element');
    chanelClickElement.bind('App\\Events\\ForkClickElementEvent', function(data) {
        var elementId = data.elementId;
        $('#' + elementId).css('border-color', '#FE8800');
    });

    var chanelLosesElement = pusher.subscribe('loses-element');
    chanelLosesElement.bind('App\\Events\\ForkLosesElementEvent', function(data) {
        var elementId = data.elementId;
        $('#' + elementId).css('border-color', '#ecf0f1');
    });

    var chanelChangedElement = pusher.subscribe('changed-element');
    chanelChangedElement.bind('App\\Events\\ForkChangedDataEvent', function(data) {
        var elementId = data.elementId;
        var elementValue = data.elementValue;
        $('#' + elementId).val(elementValue);
    });

});

function clickElement (id) {
    event.preventDefault();
    var url = $('#' + id).data('url-click');
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'elementId': id
        },
        success: function (result) {
            return true;
        }
    });
}

function losesFocusElement (id) {
    event.preventDefault();
    $('#' + id).css('border-color', '#ecf0f1');

    var url = $('#' + id).data('url-loses');
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'elementId': id
        },
        success: function (result) {
            return true;
        }
    });
}

function changedData (id) {
    event.preventDefault();
    var url = $('#' + id).data('url-changed');
    var elementValue = $('#' + id).val();
    var target = $('#' + id).data('target');
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'elementId': id,
            'elementValue': elementValue,
            'target': target
        },
        success: function (result) {
            return true;
        }
    });
}
