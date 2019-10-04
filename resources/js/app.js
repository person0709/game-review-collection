/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
    $("input[name='rating']").change(function(event) {
        var rating = event.currentTarget.value;
        var verdict = '';
        if (rating <= 2) {
            verdict = 'Horrible'
        } else if (rating <= 4){
            verdict = 'Bad'
        } else if (rating <= 6){
            verdict = 'Okay'
        } else if (rating <= 8){
            verdict = 'Good'
        } else {
            verdict = 'Excellent'
        }
        $("#rateLabel").text(verdict);
    })
})
