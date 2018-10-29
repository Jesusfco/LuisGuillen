var sliderIndexInterval;

$(document).ready(function() {

    $('.slider-container .slide:gt(0)').hide();

    sliderIndexInterval = setInterval(function() {

        slider();

    }, 6500);
});

function slider() {
    // if (button === 0) {
    // sliderCircleBasic();
    $('.slide:first-child').fadeOut(1000)
        .next('.slide').fadeIn(1000)
        .end().appendTo('.slider-container');

    // textAnimations();

}
// else {
//     button = 0;
// }