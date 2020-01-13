/*
    title : popup.js
    author : Audrey
    started on

    brief : js popups
*/

let listPopUp = document.querySelectorAll('.popup');

for (var i = 0; i < listPopUp.length; ++i) {
    setTimeout(deletePopUp, 5000, listPopUp[i]);
}

function deletePopUp(popup) {
    popup.remove();
}