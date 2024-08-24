$(document).ready(function () {

    (function ($) {
        "use strict";


        jQuery.validator.addMethod('answercheck', function (value, element) {
            return this.optional(element) || /^\bcat\b$/.test(value)
        }, "type the correct answer -_-");

        // validate reviewForm form
        $(function () {
            $('#reviewForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 20
                    }
                },
                messages: {
                    name: {
                        required: "come on, you have a name, don't you?",
                        minlength: "your name must consist of at least 2 characters"
                    },
                    email: {
                        required: "no email, no message"
                    },
                    message: {
                        required: "um...yea, you have to write something to send this form.",
                        minlength: "thats all? really?"
                    }
                },
                submitHandler: function (form) {
                    var formAction = $(form).attr('action');

                    $.ajax({
                        type: "POST",
                        url: formAction,
                        data: $(form).serialize(),
                        success: function (response) {
                            $('#reviewForm :input').attr('disabled', 'disabled');
                            $('#reviewForm')[0].reset();  // Reset the form after successful submission

                            $('#reviewForm').fadeTo("slow", 1, function () {
                                $(this).find(':input').attr('disabled', 'disabled');
                                $(this).find('label').css('cursor', 'default');
                                $('#success').fadeIn()
                                $('.modal').modal('hide');
                                $('#success').modal('show');
                            });
                        },
                        error: function (response) {
                            if (response.status === 400) {
                                $('.error-message').html(response.responseJSON.error);
                                $('#reviewForm').fadeTo("slow", 1, function () {
                                    $('#error').fadeIn()
                                    $('.modal').modal('hide');
                                    $('#error').modal('show');
                                });
                            } else {
                                $('#reviewForm').fadeTo("slow", 1, function () {
                                    $('#error').fadeIn()
                                    $('.modal').modal('hide');
                                    $('#error').modal('show');
                                });
                            }
                        }
                    });
                }
            });
        });



    })(jQuery)
})