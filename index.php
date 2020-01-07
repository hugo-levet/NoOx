<?php

$controller;

// $noView = array("parangon/RemoveSkill", "parangon/AddSkill");

//redirects to the good controller
if(isset($_GET['url']))
{
    $url = explode("/", $_GET['url']);
    
        $classController = lcfirst($url[sizeof($url)-1]);
        $fileController = './server/controller/';
        for($i = 0; $i < count($url)-1; ++$i)
        {
            $fileController .= $url[$i] . '/';
        }
        $fileController .= $classController . 'C.php';
    
    try
    {
        if(file_exists($fileController))
        {
            require_once('./server/controller/ControllerC.php');
            require_once($fileController);
        }
        else
        {
            throw new Exception('Controller file not found.');
        }
        $controller = new $classController($url);
        
        //si le fichier n'as pas de vue n'appelle pas le template
        // if(!in_array($_GET['url'], $noView))
        // {
        //     if(file_exists($fileView))
        //     {
        //         //appelle le template
        //         require_once('./public/view/template/template.php');
        //     }
        //     else
        //     {
        //         throw new Exception('View file not found.');
        //     }
        // }
    }
    catch(Exception $e)
    {
        $messageErreur = $e->getMessage(); //for development
        
        require_once('./server/controller/PageNotFoundC.php');
        $controller = new PageNotFound($url);
        require_once('./public/view/PageNotFoundV.php');
        
        echo $messageErreur;
    }
}
else
{
    require_once('./server/controller/HomePageC.php');
}
?>
