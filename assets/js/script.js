$(document).ready(function () {
    var ingredients = $('.ingredients');
    // animate the movement of the ingredients on scroll by increasing the margin
    $(window).scroll(function (event) {
        var fromTop = $(window).scrollTop();
        ingredients.animate({
            marginTop: '+' + fromTop + 'px'
        }, {
            duration: 100,
            specialEasing: {
                height: "easeOutExpo"
            }
        });
    });
});