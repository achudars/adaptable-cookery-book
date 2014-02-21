$(document).ready(function () {
    var ingredients = $('.ingredients');
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