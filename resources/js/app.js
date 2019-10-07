/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
    $("#rateLabel").hide();

    $("input[name='rating']").click(function(event) {
        var flag = 0;
        $("input[name='rating']").change(function(event) {
            var rating = event.currentTarget.value;
            var verdict = '';
            if (rating == 0){
                verdict = 'Unrated'
            }
            else if (rating <= 2) {
                verdict = 'Terrible'
            } else if (rating <= 4){
                verdict = 'Bad'
            } else if (rating <= 6){
                verdict = 'Okay'
            } else if (rating <= 8){
                verdict = 'Good'
            } else {
                verdict = 'Excellent'
            }
            $("#rateLabel").show("fast");
            $("#rateLabel").text(verdict);
            console.log('change');
        })
        console.log('click');
    })

})
