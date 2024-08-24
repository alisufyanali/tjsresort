$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                number: {
                    required: true,
                    minlength: 5
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
                number: {
                    required: "come on, you have a number, don't you?",
                    minlength: "your Number must consist of at least 5 characters"
                },
                email: {
                    required: "no email, no message"
                },
                message: {
                    required: "um...yea, you have to write something to send this form.",
                    minlength: "thats all? really?"
                }
            },
            submitHandler: function(form) {
                var formAction = $(form).attr('action');

                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: $(form).serialize(),
                    success: function(response) {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm')[0].reset();  // Reset the form after successful submission

                        $('#contactForm').fadeTo("slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor', 'default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
                            $('#success').modal('show');
                        });
                    },
                    error: function(response) {
                        $('#contactForm').fadeTo("slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
                            $('#error').modal('show');
                        });
                    }
                });
            }
        });
    });
    
        
 })(jQuery)
})