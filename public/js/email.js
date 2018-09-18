var sendingMail = 0;

function sendEmail() {

    if (sendEmail != 0) {
        return false;
    }

    sendingMail = 1;

    var email = $('#email').val();
    var message = $('#message').val();
    var name = $('#name').val();
    var subject = $('#subject').val();
    var token = $('input[name="_token"]').val();

    var url = $('#url').val();



    $.ajax({
        type: "POST",
        url: url + "/mail",
        async: true,
        data: {
            email: email,
            name: name,
            subject: subject,
            message: message,
            _token: token
        },
        success: function(data) {

            setTimeout(function() {
                swal({
                    title: "Mensaje enviado",
                    text: "Your message has been send",
                    timer: 1500,
                    type: 'success',
                    showConfirmButton: false,
                    allowEscapeKey: true,
                    allowOutsideClick: true
                });
            });

            $('#email').val('');
            $('#message').val('');
            $('#name').val('');
            $('#subject').val('');

            sendingMail = 0;

        },
        error: function(xhr, ajaxOptions, thrownError) {

                setTimeout(function() {
                    swal({
                        title: xhr.status,
                        text: thrownError,
                        timer: 1500,
                        type: 'error',
                        showConfirmButton: false,
                        allowEscapeKey: true,
                        allowOutsideClick: true
                    });
                });

                sendingMail = 0;

            } //Error
    }); //AJAX     

    return false;

}