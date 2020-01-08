<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

require_once ('./server/controller/ControllerC.php');


class HomePage extends Controller{
    function __construct($url)
    {
        $this->automaticConnection($url);
        require_once('./public/view/template/template.php');
    }

}
