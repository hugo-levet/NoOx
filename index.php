<?php

$controller;

//dirige vers le bon controlleur
if(isset($_GET['url']))
{
    $url = explode("/", $_GET['url']);

    //$category


    $classController = ucfirst($url[0]);

    //def category
    if(preg_match ( "/.*(A|a)vatar.*/" , $classController))
    {
        $category ="avatar";
    }
    else
    {
        $category ="user";
    }

    $fileView = './public/view/' . $category . '/' . $url[0] . 'V.php';
    $fileController = './server/controller/' . $category . '/' . $classController . 'C.php';

    try
    {
        if(file_exists($fileController))
        {
            require_once($fileController);
            $controller = new $classController($url);
        }
        else
        {
            throw new Exception('Controller file not found.');
        }
    }
    catch(Exception $e)
    {
        $messageErreur = $e->getMessage();
        echo $messageErreur;
    }

    try
    {
        if(file_exists($fileView))
        {
            require_once($fileView);
        }
        else
        {
            throw new Exception('View file not found.');
        }
    }
    catch(Exception $e)
    {
        $messageErreur = $e->getMessage();
        echo $messageErreur;
    }



    //    $classController = 'C' . ucfirst(strtolower($url[0]));
    //    $view = 'V' . ucfirst(strtolower($url[0]));
    //    $fichierController = './controller/' . $classController . '.php';
    //    $fichierView = './view/' . $view . '.php';
    //    try
    //    {
    //        if(file_exists($fichierController))
    //        {
    //            require_once($fichierController);
    //            $controller = new $classController($url);
    //            require_once($fichierView);
    //        }
    //        else
    //        {
    //            throw new Exception('Page introuvable');
    //        }
    //    }
    //    catch(Exception $e)
    //    {
    //        $messageErreur = $e->getMessage();
    //        require_once('./controller/CErreur.php');
    //        $controller = new CErreur($url, $messageErreur);
    //        require_once('./view/VErreur.php');
    //    }
}
else
{
    echo 'url not found';
}


//translate in english
?>
