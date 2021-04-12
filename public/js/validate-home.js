$(document).ready(function () {
    $('#listForm').validate( {
        rules: {
            todo: {
                required: true,
                maxlength: 100
            },
            date_todo: {
                required: true
            }
        },
        messages: {
            todo: {
                required: "Please enter work to do",
                maxlength: "Work to do max 255characters"
            },
            date_todo: {
                required: "Please select date to do"
            }
        }
    });
});
