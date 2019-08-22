$(document).ready(function() {    

    $("#down_to_luis").click(function(){
        var posicion = $(".luisguillen").offset().top;
        $("html, body").animate({
            scrollTop: posicion - 50
        }, 1200);    
    
    });

    //LUIS GUILLEN SECTION
    $('#perfil_photo_luis').waypoint(function(direction) {
        waypointGeneric('#perfil_photo_luis', direction, 'fadeInRight');
    }, { offset: '100%' });    

    $('#luis_title_line').waypoint(function(direction) {
        waypointGeneric('#luis_title_line', direction, 'fadeInLeft');
    }, { offset: '100%' });    

    $('#luis_title').waypoint(function(direction) {
        waypointGeneric('#luis_title', direction, 'fadeInLeft');
    }, { offset: '100%' });    

    $('#luis_description_section').waypoint(function(direction) {
        waypointGeneric('#luis_description_section', direction, 'zoomIn');
    }, { offset: '100%' });    

    $('#luis_button').waypoint(function(direction) {
        waypointGeneric('#luis_button', direction, 'zoomIn');
    }, { offset: '100%' });    

    // SPECIALITIES
    
    $('#service1').waypoint(function(direction) {
        waypointGeneric('#service1', direction, 'fadeInUp');
    }, { offset: '100%' }); 

    $('#service2').waypoint(function(direction) {
        waypointGeneric('#service2', direction, 'fadeInUp');
    }, { offset: '100%' }); 

    $('#service3').waypoint(function(direction) {
        waypointGeneric('#service3', direction, 'fadeInUp');
    }, { offset: '100%' }); 

    //BLOG
    $('#blog1').waypoint(function(direction) {
        waypointGeneric('#blog1', direction, 'fadeInLeft');
    }, { offset: '100%' });

    $('#blog2').waypoint(function(direction) {
        waypointGeneric('#blog2', direction, 'fadeInLeft');
    }, { offset: '100%' });

    $('#blog0').waypoint(function(direction) {
        waypointGeneric('#blog0', direction, 'fadeInLeft');
    }, { offset: '100%' });

});

function waypointGeneric(element, direction, string) {
    if (direction == 'down') {
        $(element).addClass('animated');
        $(element).addClass(string);
    } else {
        $(element).removeClass('animated');
        $(element).removeClass(string);
    }
}