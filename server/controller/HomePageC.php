<?php
/*
    title : HomePageC.php
    author : Celia.H
    started on :
    brief : controller page homepage
*/

require_once ('./server/controller/ControllerC.php');


class HomePage extends Controller{
    function __construct($url)
    {
        $this->automaticConnection($url);
        require_once('./public/view/template/template.php');
    }

}
