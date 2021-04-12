
$(document).ready(function () {

    jQuery.validator.addMethod('valid_name', function (value) {
        var regexName = "^(?:[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơ" +
            "ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ" +
            "ễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\s]+|)$";
        return value.trim().match(regexName);
    });
    jQuery.validator.addMethod('valid_phone', function (value) {
        var regexPhone = /^(?:0[23789][0-9]{8}|)$/;
        return value.trim().match(regexPhone);
    });
    jQuery.validator.addMethod('valid_username', function (value) {
        var regexUsername =
            /^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        return value.trim().match(regexUsername);
    });
    $("#formUser").validate( {
        rules: {
            username: {
                required: true,
                valid_username: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3,
                maxlength: 16
            },
            password_again: {
                required: true,
                minlength: 3,
                maxlength: 16
            },
            position: {
                required: true,
                maxlength: 50
            },
            fullname: {
                minlength: 6,
                maxlength: 50,
                valid_name: true
            },
            phone_number: {
                valid_phone: true
            }
        },
        messages: {
            username:{
                required: "Please enter user name",
                valid_username: "Please enter a validate username"
            },
            email: {
                required: "Please enter email",
                email: "Please enter a validate email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password min 3 characters",
                maxlength: "Password max 16 characters"
            },
            password_again: {
                required: "Please Re-enter password",
                minlength: "Password min 3 characters",
                maxlength: "Password max 16 characters"
            },
            position: {
                required: "Please enter position",
                maxlength: "Position max 50 characters"
            },
            fullname: {
                minlength: "Fullname min 6 characters",
                maxlength: "Fullname max 50 characters",
                valid_name: "Fullname is not integer",
            },
            phone_number: {
                valid_phone: "Please enter a validate phone number"
            }
        }

    });
});

$('#password, #password_again').on('keyup', function () {
    if ($('#password').val() == $('#password_again').val()) {
        $('.error-pass').html('');
    } else
        $('.error-pass').html('Not Matching').css("color","#ff0000");
});
