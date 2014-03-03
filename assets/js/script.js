(function() {

  $(".the").hover(function() {
    var word = $(this).text();
    find_synonyms(word);
});

})();

function find_synonyms(word) {

    var API_KEY = "3691e6b302f58d4e90d209e0762b1e04";
    var synonyms = [];

    $.ajax({
        type: "GET",
        url: "http://words.bighugelabs.com/api/2/" + API_KEY + "/" + word + "/json?callback=?",
        processData : true,
        data: {},
        dataType: "json",
        success:
        function(data) {
            synonyms = JSON.parse(JSON.stringify(data.noun.syn));
            $(".the").attr('title',               synonyms[0]+", "+synonyms[1]+", "+synonyms[2]);
            $(".the").attr('data-original-title', synonyms[0]+", "+synonyms[1]+", "+synonyms[2]);
            $(".the").on( "mouseenter", function() {
                $(this).tooltip('show');
            })
            .on( "mouseleave", function() {
                $(this).tooltip('hide');
            });
        }
    });
};
