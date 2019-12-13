<?php
/*
    title : ControllerC.php
    author : Hugo.L
    started on : 27/11/2019
    brief : global controller
*/
require_once('./server/model/user/UserM.php');
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
        return : void
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

    /*
        name : getUrlHere
        author : Hugo.L
        brief : Get the value of urlHere
        return : mixed
    */
    public function getUrlHere()
    {
        return $this->urlHere;
    }

    /*
        name : setUrlHere
        author : Hugo.L
        brief : Set the value of urlHere
        input parameters : mixed $urlHere  
        return : null
    */
    public function setUrlHere()
    {
        $this->urlHere = $urlHere;
    }

    /*
        name : getRootReturn
        author : Hugo.L
        brief : Get the value of rootReturn
        return : mixed
    */
    public function getRootReturn()
    {
        return $this->rootReturn;
    }

    /*
        name : setRootReturn
        author : Hugo.L
        brief : Set the value of rootReturn
        input parameters : mixed $rootReturn  
        return : null
    */
    public function setRootReturn()
    {
        $this->rootReturn = $rootReturn;
    }
}
?>