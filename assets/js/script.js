$(document).ready(function() {

    $(".ingredient-name").lettering('words');

    $(".ingredient-name span").hover(
        function() {
            var word = $(this).text();
            if(!(  word == "for" || word == "such" || word == "as" || word == "and" || word == "in"
                || word == "or" || word == "e.g." || word == "if" || word == "into" || word == "to")){
                $(this).addClass("matched");
                var matched = $(".tab-content ol li:contains('"+word+"'), .tab-content label:contains('"+word+"')");
                matched.css({"border":"2px solid Coral"});
                try {
                    $('html, body').animate({
                        scrollTop: matched.offset().top
                    }, 2000);
                } catch(e) {
                    console.log("You are probably scrolling over an element that we cannot find. " + e);
                }

            }

        },
        function() {
           var word = $(this).text();
            if(!(  word == "for" || word == "such" || word == "as" || word == "and" || word == "in"
                || word == "or" || word == "e.g." || word == "if" || word == "into" || word == "to")){
                $(this).removeClass("matched");
                var matched = $(".tab-content ol li:contains('"+word+"'), .tab-content label:contains('"+word+"')");
                matched.css({"border":"none"});

            }

        }
    );

	$('.recipe-style').click(function() {
		$('.style-change-error').addClass('hidden');

		var clickedButton = $(this);
		var chosenStyle   = clickedButton.data('style');

		$.ajax({
			type: 'POST',
			url: $('#baseUrl').text() + 'ajax/changeRecipeStyle',
			data: {recipeStyle: chosenStyle},
			success: function() {
				$('.recipe-style').each(function() {
					$(this).parent().removeClass('active');
					if($(this).data('style') == chosenStyle)
					{
						$(this).parent().addClass('active');
					}
				});

				if(clickedButton.hasClass('home-style-choose'))
				{
					clickedButton.parentsUntil('body', '.container').fadeOut();
					$('.welcome-message').fadeOut();
					$('.home-intro.success').find('.style').text(chosenStyle);
					$('.home-intro.success').removeClass('hidden');
				}

				$('.style-change-success').removeClass('hidden').delay(2000).fadeOut('slow', function() {
					$('.style-change-success').addClass('hidden').css('display', 'block');
				});
			},
			error: function() {
				$('.style-change-error').removeClass('hidden');
			}
		});
	});
});
