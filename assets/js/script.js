$(document).ready(function() {

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
        
        //Update ingredients
        $('.ingredients ul').removeClass('active');
        $('#ingredients-'+chosenStyle).addClass('active');
	});
});
