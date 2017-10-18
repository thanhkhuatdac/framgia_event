$(document).ready(function ($) {

    $( "#toggle-create-subject" ).on("click", function() {
        event.preventDefault();
        $( "#create-subject" ).toggle(400);
    });

    $( "#btn-add-new-subject" ).on("click", function() {
        event.preventDefault();
        if ($( "#new-subject" ).val() == '') {
            alert('You have to enter Subject Name');
            return false;
        }
        var subject = '<option value="new" selected>'+$('#new-subject').val()+'</option>';
        var flag = 0;
        $("#select-subjects > option").each(function() {
            if ($('#new-subject').val() == this.text) {
                flag = 1;
            }
        });
        if (flag == 1) {
            alert('Your input Subject already exists!');
            return false;
        }
        $( "#select-subjects" ).prepend(subject);
        showBtnRemoveSubject();
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
        }
    });

    $( "#toggle-create-services" ).on("click", function() {
        event.preventDefault();
        $.ajax({
            url:'create-service',
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
                    var flag = 0;
                    $("#select-categories > option").each(function() {
                        if ($('#new-category').val() == this.text) {
                            flag = 1;
                        }
                    });
                    if (flag == 1) {
                        alert('Your input Category already exists!');
                        return false;
                    }
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
                        url:'create-service',
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
                        success: function(result)
                        {
                            // console.log(result);
                            // xử lý tiếp ở pull sau
                        }
                    });
                });
            }
        });
    });

});
