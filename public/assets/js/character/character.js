/*
    title : character.js
    author : Audrey
    started-on : 

    brief : submit form by clicking / bluring inputs
*/


var listRating = document.querySelectorAll('input.rating, input.Srating');

var listInput = document.querySelectorAll('input[name="valueInput"], textarea');

console.log(listInput)

listInput.forEach(function(input) {
    input.addEventListener("blur", submitFormByBlur);
})

listRating.forEach(function(rating) {
    rating.addEventListener("click", submitFormByClicking)
})

function submitFormByBlur() {
    var form = this.parentNode;
    form.submit();
}

function submitFormByClicking() {
    var form = this.parentNode.parentNode;
    form.submit();
}

