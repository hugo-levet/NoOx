<?php

$controller;

//redirects to the good controller
if(isset($_GET['url']))
{
    $url = explode("/", $_GET['url']);
    
    $classController = ucfirst($url[0]);
    
    //def category
    if(preg_match ( "/.*(A|a)vatar.*/" , $classController))
    {
        $category ="avatar";
    }
    if(preg_match ( "/.*(P|p)arangon.*/" , $classController))
    {
        $category ="parangon";
    }
    else
    {
        $category ="user";
    }

    //found files
    if($category == "parangon" && isset($url[1]))
    {
        $classController = ucfirst($url[1]);
        $fileController = './server/controller/' . $category . '/' . $classController . 'C.php';
        $fileView = './public/view/' . $category . '/' . $url[1] . 'V.php';
    }
    else
    {
        $fileController = './server/controller/' . $category . '/' . $classController . 'C.php';
        $fileView = './public/view/' . $category . '/' . $url[0] . 'V.php';
    }
    
    try
    {
        if(file_exists($fileController))
        {
            require_once($fileController);
        }
        else
        {
            throw new Exception('Controller file not found.');
        }
        $controller = new $classController($url);
        
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
        $messageErreur = $e->getMessage(); //for development
        
        require_once('./server/controller/PageNotFoundC.php');
        $controller = new PageNotFound($url);
        require_once('./public/view/PageNotFoundV.php');
        
        echo $messageErreur;
    }
}
else
{
    echo 'not yet implement : open home';
}
?>
