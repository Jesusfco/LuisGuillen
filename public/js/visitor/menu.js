var menu = 0;

$(document).ready(function() {

    $('#activeMovMenu').click(function() {

        if (menu == 0) {

            menu = 1;

            $('#movMenu').removeClass('inactive');

            setTimeout(() => {

                $('#movMenu').removeClass('opacity');

            }, 10);

        }

    });

    $('#movMenuBackground').click(function() {

        if (menu == 1) {

            menu = 0;

            $('#movMenu').addClass('opacity');

            setTimeout(() => {

                $('#movMenu').addClass('inactive');

            }, 510);

        }

    });

});