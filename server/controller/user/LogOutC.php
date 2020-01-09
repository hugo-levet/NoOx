<?php
/*
    title : LogOutC.php
    author : Celia.H
    started on :
    brief : controller page logout
*/

class LogOut extends Controller {
    function __construct()
    {
        session_destroy();
        header('Location: NoOx/HomePage');
    }
}