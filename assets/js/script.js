$(document).ready(function() {

	/*$(".the").tooltip();*/

	/*$(".the").hover(function() {
	    var word = $(this).text();
	    find_synonyms(word);
	});*/

    $(".ingredient-name").lettering('words');

    $(".ingredient-name span").hover(
        function() {
            var word = $(this).text();
            var matched = $(".tab-content ol li:contains('"+word+"'), .tab-content label:contains('"+word+"')");
            matched.css({"border":"2px solid Coral"});
        },
        function() {
            var word = $(this).text();
            var matched = $(".tab-content ol li:contains('"+word+"'), .tab-content label:contains('"+word+"')");
            matched.css({"border":"none"});
        }
    );

	$('.recipe-style').click(function() {
		$('.style-change-error').addClass('hidden');

		var chosenStyle = $(this).data('style');

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
			},
			error: function() {
				$('.style-change-error').removeClass('hidden');
			}
		});
	});
});
