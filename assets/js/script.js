$(document).ready(function() {

    // activates tooltip for the ingredient selection dropdown menu
    $('button > span').tooltip();

    // storing text selectors and
    // activating word selection for text
    $(".tab-pane p, .tab-pane label, #step-by-step li, .ingredient-name").lettering('words');

    // recipe and ingredient text
    var words = $(".tab-pane p span, .tab-pane label span, .tab-pane li span, .ingredient-name span");

    // lis tof unknown words and their explanations
    var terms = {
        "sage" : "an aromatic plant whose greyish-green leaves are used as a culinary herb",
        "gremolata" : "a dressing or garnish made with chopped parsley, garlic, and grated lemon zest, served as an accompaniment to meat or fish",
        "pesto" : "a sauce of crushed basil leaves, pine nuts, garlic, Parmesan cheese, and olive oil, typically served with pasta",
        "passata" : "a thick paste made from sieved tomatoes and used especially in Italian cooking"
    };

    $.each( terms, function( key, value ) {
      $(".tab-pane p span:contains('"+key+"'), .tab-pane label span:contains('"+key+"'), #step-by-step li span:contains('"+key+"'), .ingredient-name span:contains('"+key+"')").addClass("matched").tooltip().attr('data-original-title', value);
    });

    // breadcrumbs
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
