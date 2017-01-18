$(document).ready(function () {
    $('.add-mile').submit(function (event) {
        event.preventDefault();
        $(".add-mile").ajaxSubmit({
            type: 'post',
            complete: function (res) {
                if (res.responseText === '<div class="alert alert-error">Your data has not been saved into DB!</div>') {
                    $("#resultUpdate").html('<div class="alert alert-error">Your data has not been saved into DB!</div>');
                    //$(".add-mile").resetForm();
                } else {
                    $("#resultUpdate").html('<div class="alert alert-success">Your data has been saved into DB!</div>');
                    getByID(res.responseText);
                    //$(".add-mile").resetForm();
                }
            }

        });
    });
    $('button.edit').on("click", function () {
        $('input.id').val($(this).parent().siblings(".id").text());
        $('input#departure').val($(this).parent().siblings(".departure").text());
        $('input#destination').val($(this).parent().siblings(".destination").text());
        $('input#bookingdate_from').val($(this).parent().siblings(".bookingdate_from").text());
        $('input#bookingdate_to').val($(this).parent().siblings(".bookingdate_to").text());
        $('input#flightdate_from').val($(this).parent().siblings(".flightdate_from").text());
        $('input#flightdate_to').val($(this).parent().siblings(".flightdate_to").text());
        $('input#amount').val($(this).parent().siblings(".amount").text());

        $('input.id').val($(this).attr('edit-id'));
    });
    $("tr td").on("click", ".delete", function () {
        $(this).parent().parent().remove();
        removeByID($(this).attr('delete-id'));
        $('.add-mile').clearForm();
    });
    $('.clear-form').on('click', function () {
        $('.add-mile').clearForm();
        $('input.id').val('');
    });
    $(".datepicker").datepicker({
        startDate: new Date()
    });
});
function getByID(ID) {
    $.ajax({
        url: "/add/getByID",
        type: 'post',
        data: {id: ID},
        dataType: 'json',
        complete: function (data) {
            var jsonObject = $.parseJSON(data.responseText);
            $('.all-miles > tbody:last-child').append('<tr><td class="id" >' + jsonObject.id + '</td><td class="departure">' + jsonObject.departure + '</td><td class="destination">' + jsonObject.destination + '</td><td class="bookingdate_from">' + jsonObject.bookingdate_from + '</td><td class="bookingdate_to" >' + jsonObject.bookingdate_to + '</td><td class="flightdate_from" >' + jsonObject.flightdate_from + '</td><td class="flightdate_to">' + jsonObject.flightdate_to + '</td><td class="amount">' + jsonObject.amount + '</td><td><button class="edit btn btn-info" edit-id="' + jsonObject.id + '" >Edit</button><button class="delete btn btn-danger" delete-id="' + jsonObject.id + '" >Delete</button></td></tr>');
            $("tr td").on("click", ".delete", function () {
                $(this).parent().parent().remove();
                removeByID($(this).attr('delete-id'));
                $('.add-mile').clearForm();
            });
            $('button.edit').on("click", function () {
                $('input.id').val($(this).parent().siblings(".id").text());
                $('input#departure').val($(this).parent().siblings(".departure").text());
                $('input#destination').val($(this).parent().siblings(".destination").text());
                $('input#bookingdate_from').val($(this).parent().siblings(".bookingdate_from").text());
                $('input#bookingdate_to').val($(this).parent().siblings(".bookingdate_to").text());
                $('input#flightdate_from').val($(this).parent().siblings(".flightdate_from").text());
                $('input#flightdate_to').val($(this).parent().siblings(".flightdate_to").text());
                $('input#amount').val($(this).parent().siblings(".amount").text());
                $('input.id').val($(this).attr('edit-id'));
            });
        }
    });
}
function removeByID(ID) {
    $.ajax({
        url: "/add/removeByID",
        type: 'post',
        data: {id: ID},
        dataType: 'json',
        complete: function (data) {
            //console.log('Your Mile Entry was deleted!');
        }
    });
}
