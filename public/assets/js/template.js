/*
    title : templateG
    author : Audrey
    started-on : 20/11/19

    brief : template script
*/

var navTriggerButton = document.getElementById("navbarTrigger");
var navStatment = document.getElementById("header");




navTriggerButton.addEventListener("click", navChangeMod);

function navChangeMod() {
    switch (navStatment.className) {
        case "navND":
            navStatment.className = "navD";
            navTriggerButton.className = "buttonNavD";
            break;
    
        case "navD":
            navStatment.className = "navND";
            navTriggerButton.className = "buttonNavND";
            break;
        default : 
            navStatment.className = "navD";
            navTriggerButton.className = "buttonNavD";
            break;
    }
}
