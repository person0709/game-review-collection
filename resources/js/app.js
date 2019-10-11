/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    $("#rate-label").hide();
    $("#review-text").hide();

    var radios = document.getElementsByName('rating');
    radios.forEach(radio => {
        if (radio.hasAttribute('checked')){
            $("#rate-label").text(getVerdict(radio.value));
            $("#rate-label").show();
            $("#review-text").show();
        }
    });

    $("input[name='rating']").change(function (event) {
        var rating = event.currentTarget.value;
        $("#rate-label").text(getVerdict(rating));
        $("#rate-label").show("fast");
        $("#review-text").show("fast");
    })

})

function getVerdict(rating) {
    var verdict = '';
    if (rating == 0) {
        verdict = 'Unrated'
    }
    else if (rating <= 2) {
        verdict = 'Terrible'
    } else if (rating <= 4) {
        verdict = 'Bad'
    } else if (rating <= 6) {
        verdict = 'Okay'
    } else if (rating <= 8) {
        verdict = 'Good'
    } else {
        verdict = 'Excellent'
    }
    return verdict;
}
