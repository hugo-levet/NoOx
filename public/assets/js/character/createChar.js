/*
    title : createChar.js
    author : Audrey
    started on : 17/12/2019

    brief : 
*/

var listInfoButton = Array.from(document.querySelectorAll('.informationButton'));
var openedInfo = null;

listInfoButton.forEach(Element => {
    Element.addEventListener("click", toggleInfo);
});

document.getElementById('closeButton').addEventListener('click', closeInfo);

function toggleInfo() {
    document.getElementById('informationsContainer').className = 'toggle';
    document.getElementById(this.dataset.toggle).className = 'toggle';
    openedInfo = this.dataset.toggle;
}


function closeInfo() {
    document.getElementById('informationsContainer').className ='noToggle';
    document.getElementById(openedInfo).className = 'noToggle';
    openedInfo = null;
}