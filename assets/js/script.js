$(document).ready(function() {
	(function() {
		$(".the").tooltip();

		$(".the").hover(function() {
		    var word = $(this).text();
		    find_synonyms(word);
		});

	})();

	function find_synonyms(word) {
		var API_KEY = "3691e6b302f58d4e90d209e0762b1e04";

		$.ajax({
		    type: "GET",
		    url: "http://words.bighugelabs.com/api/2/" + API_KEY + "/" + word + "/json?callback=?",
		    processData : true,
		    data: {},
		    dataType: "json",
		    success:
		    function(data) {
		       synonyms = JSON.parse(JSON.stringify(data.noun.syn));
		        $(".the").one().mouseenter(function() {
		            $(this).one().attr('data-original-title', synonyms[0]+", "+synonyms[1]+", "+synonyms[2]);
		        });
		    }
		}).done(function(data) {

		});
	};

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
