<?php

$controller;

//redirects to the good controller
if(isset($_GET['url']))
{
    $url = explode("/", $_GET['url']);
<<<<<<< HEAD

=======
    
        $classController = lcfirst($url[sizeof($url)-1]);
        $fileController = './server/controller/';
        for($i = 0; $i < count($url)-1; ++$i)
        {
            $fileController .= $url[$i] . '/';
        }
        $fileController .= $classController . 'C.php';
    
>>>>>>> 14b10e2f0c9abc274c54406cea182f7076ca72e4
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
    header('Location: ./HomePage');
}
?>
