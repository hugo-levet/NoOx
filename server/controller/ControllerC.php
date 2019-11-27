<?php
/*
    title : ControllerC.php
    author : Hugo.L
    started on : 27/11/2019
    brief : global controller
*/
require_once('model/user/UserM.php');
abstract class Controller
{
    protected $currentUser = null;
    protected $isConnected = false;
    protected $rootReturn;
    protected $urlHere;
    
    /*
        name : automaticConnection
        author : Hugo.L
        brief : verificate connection of user and initialize paths
        input parameters : array $url
        return : null
    */
    protected function automaticConnection($url = [])
    {
        session_start();
        if (isset($_SESSION['idcurrentUser'], $_SESSION['password'])) // authentication is valid
        {
            //TODO verify if password and id are correct
            $this->isConnected = true;
            $this->currentUser = new MUser($_SESSION['idcurrentUser']);
        }

        // initialization $rootReturn
        foreach ($url as $key)
        {
            if($key != 0)
            {
                $this->rootReturn .= '../';
            }
        }
        // initialization $urlHere
        foreach ($url as $key => $p)
        {
            $this->urlHere .= $p;
            if($key < count($url)-1)
            {
                $this->urlHere .= '/';
            }
        }
    }
}
?>