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

});
