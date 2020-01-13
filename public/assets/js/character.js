/*
    title : character
    author : Audrey
    started-on : 

    brief : submit form by clicking / bluring input 
*/
var listRating = document.querySelectorAll('input.rating');

console.log(listRating)

listRating.forEach(function(rating) {
    rating.addEventListener("click", submitFormByClicking)
})


function submitFormByClicking() {
    var form = this.parentNode.parentNode;
    form.submit();
}