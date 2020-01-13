<?php
    /*
        title : popupV
        author : Audrey
        started on:

        brief : view popups
    */

    if (isset($_SESSION['popup'])) {
        $popup = $_SESSION['popup'];

        if ($popup->getTheme() == 'success') {
            echo    '<div class="popup popupsuccess">'
                    .'<p class="popupTarget">'
                    .$popup->getTarget()
                    .'</p> <p class="popupMessage">'
                    .$popup->getMessage()
                    .'</p></div>';
        }
        else if ($popup->getTheme() == 'error') {
            echo    '<div class="popup popuperror">'
                    .'<p class="popupTarget">'
                    .$popup->getTarget()
                    .'</p> <p class="popupMessage">'
                    .$popup->getMessage()
                    .'</p></div>';
        }

        // avoid display the same popup twice.
        unset($_SESSION['popup']);

    }
?>