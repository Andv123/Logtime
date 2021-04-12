$( document).ready(function() {
    $("#formOT").validate( {
        rules: {
            username: {
                required: true
            },
            dateOT: {
                required: true
            },
            start: {
                required: true
            },
            end: {
                required: true
            },
            work: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Please select user name"
            },
            dateOT: {
                required: "Please enter date OT"
            },
            start: {
                required: "Please enter time start"
            },
            end: {
                required: "Please enter time end"
            },
            work: {
                required: "Please enter work OT"
            }
        }
    });
});

if ($('.time-start').text() != "") {
    $('.endOT').css('display', 'block');
    if ($('.time-end').text() != "") {
        $('.work-OT, .addOT').css('display', 'block');
    }
}


$('.startOT').click(function () {
    if ($('.time-start').html() === "") {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes();
        $('.endOT').css('display', 'block');
        $('.time-start').html("Time start: " + time);
        $('.start-ot').val(time);
    } else {
        var cfm = confirm("Are you sure you want to change this time start ?");
        if (cfm == true) {
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes();
            $('.time-start').html("Time start: " + time);
            $('.start-ot').val(time);
        }
    }
});
$('.end').click(function () {
    if ($('.time-end').html() === "") {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes();
        $('.work-OT, .addOT').css('display', 'block');
        $('.time-end').html("Time end: " + time);
        $('.end-ot').val(time);
    } else {
        var cfm = confirm("Are you sure you want to change this time end ?");
        if (cfm == true) {
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes();
            $('.time-end').html("Time end: " + time);
            $('.end-ot').val(time);
        }
    }
});
$('.addOT').click(function () {
    if ($('.end-ot').val() < $('.start-ot').val()) {
        var cfm = confirm("The time start more than time end." +
            "You need change this time!");
        if (cfm == true) {
            return false;
        }
    }
});

$('#start, #end').change(function () {
    if (($('#end').val()).getTime() >= ($('#start').val()).get()) {
        $('.error-time').html('');
    } else {
        $('.error-time')
            .html('The end time must be less than the start time')
            .css("color", "#ff0000");
    }
});

