<?php
    /*
        title : announceC.php
        author : Audrey
        started-on : 04/01/2020

        brief : controller admin announce page
    */

    require(__DIR__.'/../../model/announce/announceM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');


    class announce {

        function __construct($url) {

            if (isset($_POST['submit'])) {
                if (!isset($_POST['title']) || strlen($_POST['title']) > 255) {
                    $_SESSION['popup'] = new PopUp('error', 'ANNONCE - titre', 'le titre doit être compris entre 1 et 255 caractères.');
                    header('location:/admin/announce');
                    exit;
                }

                if (!isset($_POST['description'])) {
                    $_SESSION['popup'] = new PopUp('error', 'ANNONCE - description', 'le champs description doit être impérativement rempli.');
                    header('location:/admin/announce');
                    exit;
                }


                $annonce = new announceM();
                $annonce->addAnnounce($_POST['title'], $_POST['description']);

                $_SESSION['popup'] = new PopUp('success', 'ANNONCE', 'L\'annonce a été ajoutée !');
                header('location:/admin/announce');
                exit;
            }


            require(__DIR__.'/../../../public/view/admin/announceV.php');
        }
        
    }

?>