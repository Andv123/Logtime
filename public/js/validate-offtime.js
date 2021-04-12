$(document).ready(function() {
    $("#formOff").validate( {
        rules: {
            username: {
                required: true
            },
            dateOff: {
                required: true
            },
            reason: {
                required: true,
                maxlength: 255
            }
        },
        messages: {
            username: {
                required: "Please select user name"
            },
            dateOff: {
                required: "Please enter date off"
            },
            reason: {
                required: "Please enter reason off",
                maxlength: "Reason max 255 characters"
            }
        }
    });
});
