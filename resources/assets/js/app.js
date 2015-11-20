$(function()
{
    /*
    |--------------------------------------------------------------------------
    | GOOGLE MAPS SCROLL PREVENTION
    |--------------------------------------------------------------------------
    */
    $('#map_canvas').addClass('scroll-off');

    $('#map_embed').on('click', function () {
        $('#map_canvas').removeClass('scroll-off');
    });

    $("#map_canvas").mouseleave(function () {
        $('#map_canvas').addClass('scroll-off');
    });

    /*
    |--------------------------------------------------------------------------
    | COUNTDOWN
    |--------------------------------------------------------------------------
    */
    $('#countdown').countdown(eventDate, function(event) {
        $('#countdown-days').html(event.strftime('<i>%D</i> giorni'));
        $('#countdown-hours').html(event.strftime('<i>%H</i> ore'));
        $('#countdown-minutes').html(event.strftime('<i>%M</i> minuti'));
        $('#countdown-seconds').html(event.strftime('<i>%S</i> secondi'));
    });
})
