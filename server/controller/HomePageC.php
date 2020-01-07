<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

require_once ('./server/controller/ControllerC.php');
require_once ('./public/view/homePageV.php');
require_once ('./server/model/HomePageM.php');



class HomePage extends Controller{
    function __construct($url)
    {
        $this->automaticConnection($url);
        echo('CCCCCCC');
    }
}