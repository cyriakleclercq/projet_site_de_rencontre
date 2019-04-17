<?php

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case "visitor":
            require "model/visitor.php";
            require "controller/visitorController.php";

            switch ($_GET['action']) {

                case "inscription":

                    $inscription = new \App\Controller\visitorController();
                    $inscription->inscription();
                    break;

                case "connection":

                    $connection = new \App\Controller\visitorController();
                    $connection->login();
                    break;


            }
        break;
        case "user":

            session_start();

            require "model/user.php";
            require "controller/userController.php";

            switch ($_GET['action']) {

                case "logout":

                    $logout = new \App\Controller\userController();
                    $logout->logout();
                    break;


                case "affichageUser":

                    $affichage = new \App\controller\userController();
                    $affichage->affichageUser();
                    break;

                case "create":

                    $create = new \App\controller\userController();
                    $create->createEvent();
                    break;

                case "affichage":

                    $affichage = new \App\controller\userController();
                    $affichage->affichageEvent();
                    break;

                case "affichageEvent":

                    $affichageEvent = new \App\controller\userController();
                    $affichageEvent->affichageEvent();
                    break;

                case "deleteUser":

                    $deleteUser = new \App\controller\userController();
                    $deleteUser->deleteUser();
                    break;

                case "editUser":

                    $editUser = new \App\controller\userController();
                    $editUser->editUser();
                    break;

                case "deleteEvent":

                    $deleteEvent = new \App\controller\userController();
                    $deleteEvent->deleteEvent();
                    break;

                case "editEvent":

                    $editEvent = new \App\controller\userController();
                    $editEvent->editEvent();
                    break;

                case "vosEvent":

                    $vosEvent = new \App\controller\userController();
                    $vosEvent->vosEvent();
                    break;

                case "editVosEvent":

                    $editVosEvent = new \App\controller\userController();
                    $editVosEvent->editVosEvent();
                    break;

                case "comment":

                    $comment = new \App\controller\userController();
                    $comment->comment();
                    break;

                case "details":

                    $detail = new \App\controller\userController();
                    $detail->details();
                    break;
        }
        break;

        case "ajax":

            require "model/ajax.php";
            require "controller/ajaxController.php";

            $commentaire = new \App\controller\ajaxController();
            $commentaire->ajaxCommentaire();

            if (isset($_GET['postTitle']) & isset($_GET['postCommentaire']))
            {
                $post = new \App\controller\ajaxController();
                $post->ajaxPost();
            }
            break;

    }


} else {

    require "model/visitor.php";
    require "controller/visitorController.php";

    $accueil = new \App\Controller\visitorController();
    $accueil-> affichageEvent();
}
