$(document).ready(function ($) {
    $('#datetimepicker-start-date').datetimepicker();
    $('#datetimepicker-due-date').datetimepicker();

    $( "#toggle-create-subject" ).on("click", function() {
        event.preventDefault();
        $( "#create-subject" ).toggle(400);
    });

    $( "#btn-add-new-subject" ).on("click", function() {
        event.preventDefault();
        if ($( "#new-subject" ).val() == '') {
            alertify.notify('You have to enter Subject Name', 'error', 7, function() {

            });
            return false;
        }
        var subject = '<option value="new" selected>'+$('#new-subject').val()+'</option>';
        $( "#select-subjects" ).prepend(subject);
        $( "#input-new-subject" ).val($('#new-subject').val());
        showBtnRemoveSubject();
        $( "#toggle-create-subject" ).hide(100);
        $( "#create-subject" ).hide(100);
    });

    function showBtnRemoveSubject () {
        event.preventDefault();
        var optionSelected = $( "#select-subjects option:selected" ).val();
        if (optionSelected == "new") {
            $( "#remove-subject" ).show(400);
            return false;
        }
        $( "#remove-subject" ).hide(400);
    }

    $( "#select-subjects" ).on("change", showBtnRemoveSubject);

    $( "#toggle-remove-subject" ).on("click", function() {
        event.preventDefault();
        if ($( "#select-subjects option:selected" ).val() == "new") {
            $( "#select-subjects option:selected" ).remove();
            showBtnRemoveSubject();
            $( "#toggle-create-subject" ).show(100);
            $( "#create-subject" ).show(100);
        }
    });

    function loadCategories () {
        var userId = $( "#user-id" ).val();
        $.ajax({
            url: '/user/dashboard/'+userId+'/event/load-categories',
            type:'GET',
            success: function(result)
            {
                $( "#select-categories" ).html(result);
            }
        });
    }

    var totalServicePrice = 0;
    $( "#toggle-create-services" ).on("click", function() {
        event.preventDefault();
        var eventPlanSlug = $( "#input-detail-plan-slug" ).val();
        var userId = $( "#user-id" ).val();
        $.ajax({
            url: '/user/dashboard/'+userId+'/event/create-service',
            type:'GET',
            success: function(result)
            {
                $( "#event-services" ).html(result);
                $( "#toggle-create-services" ).hide();
            },
            complete: function()
            {
                $( "#toggle-create-category" ).on("click", function() {
                    event.preventDefault();
                    $( "#create-category" ).toggle(400);
                });

                $( "#btn-add-new-category" ).on("click", function() {
                    event.preventDefault();
                    if ($( "#new-category" ).val() == '') {
                        alert('You have to enter Category Name');
                        return false;
                    }
                    var category = '<option value="new" selected>'+$('#new-category').val()+'</option>';
                    $( "#select-categories" ).prepend(category);
                    showBtnRemoveCategory();
                    $( "#toggle-create-category" ).hide(100);
                    $( "#create-category" ).hide(100);
                });

                function showBtnRemoveCategory () {
                    event.preventDefault();
                    var optionSelected = $( "#select-categories option:selected" ).val();
                    if (optionSelected == "new") {
                        $( "#remove-category" ).show(400);
                        return false;
                    }
                    $( "#remove-category" ).hide(400);
                }

                $( "#select-categories" ).on("change", showBtnRemoveCategory);

                $( "#toggle-remove-category" ).on("click", function() {
                    event.preventDefault();
                    if ($( "#select-categories option:selected" ).val() == "new") {
                        $( "#select-categories option:selected" ).remove();
                        showBtnRemoveCategory();
                        $( "#toggle-create-category" ).show(100);
                        $( "#create-category" ).show(100);
                    }
                });

                $( "#btn-add-new-service" ).on("click", function() {
                    event.preventDefault();
                    var category = $( "#select-categories" ).val();
                    var category_name = $( "#select-categories option:selected" ).text();
                    var name = $( "#service-name" ).val();
                    var price = $( "#service-price" ).val();
                    var description = $( "#service-description" ).val();
                    $.ajax({
                        url:'/user/dashboard/'+userId+'/event/post-create-service',
                        type:'POST',
                        async: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'category': category, 'category_name': category_name,
                            'name': name, 'price': price,
                            'description': description
                        },
                        success: function (result)
                        {
                            $.each( result, function( key, value ) {
                                var liTag = $("<li class='list-group-item'></li>");
                                var display = value['name']+': '+value['price'];
                                liTag.html(display);
                                $( "#service-results" ).prepend(liTag);
                                alertify.notify('Add Service Success', 'success', 7, function() {

                                });
                                totalServicePrice += parseFloat(value['price']);
                            });
                            if ($( "#select-categories option:selected" ).val() == "new") {
                                $( "#select-categories option:selected" ).remove();
                                showBtnRemoveCategory();
                                $( "#toggle-create-category" ).show(100);
                                $( "#create-category" ).hide(100);
                            }
                            loadCategories();
                        },
                        error: function (data) {
                            var errors = data.responseJSON.errors;
                            $.each( errors, function( key, value ) {
                                alertify.notify(value[0], 'error', 7, function() {

                                });
                            });
                        }
                    });
                    $( "#detail-amount" ).html('$'+totalServicePrice);
                    $( "#input-detail-amount" ).val(totalServicePrice);
                });
            }
        });
    });

});
