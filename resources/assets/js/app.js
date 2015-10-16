$(function()
{
    $('#countdown').countdown(eventDate, function(event) {
        $('#countdown-days').html(event.strftime('<i>%D</i> giorni'));
        $('#countdown-hours').html(event.strftime('<i>%H</i> ore'));
        $('#countdown-minutes').html(event.strftime('<i>%M</i> minuti'));
        $('#countdown-seconds').html(event.strftime('<i>%S</i> secondi'));
    });
})
