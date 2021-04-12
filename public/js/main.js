//validate form contact
$(document).ready(function() {
    $("#contactForm").validate( {
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            name: "Please enter your full name",
            email: "Please enter a validate email address",
            message: "Please enter a message"
        },
    });
});

//validate form login
$(document).ready(function() {
    $("#loginForm").validate( {
        rules: {
            name: {
                required: true
            },
            password: {
                required: true,
                minlength: 3,
                maxlength: 16
            }
        },
        messages: {
            name:{
                required: "Please enter your user name"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password min 3 characters",
                maxlength: "Password max 16 characters"
            }
        }
    });
});

