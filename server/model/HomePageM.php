<?php

/*
    title : HomePageM.php
    author : Celia.H
    started on :
    brief : model page homepage
*/

require_once ('./server/model/ModelM.php');


class HomePageM extends ModelIm {
    function __construct()
    {
        $this->databaseConnection();
        echo('hohoMM');
    }
}


