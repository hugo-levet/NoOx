<?php
/*
    title : LogOutC.php
    author : Celia.H
    started on :
    brief : controller page logout
*/

class LogOutC extends Controller {
    function __construct()
    {
        session_destroy();
        header('Location: NoOx/user/HomePage');
    }
}