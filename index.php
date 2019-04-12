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


                case "affichage":

                    $affichage = new \App\controller\userController();
                    $affichage->affichageUser();
                    break;

                case "create":

                    $create = new \App\controller\userController();
                    $create->createEvent();
                    break;
        }
        break;
    }


} else {

    require "model/visitor.php";
    require "controller/visitorController.php";

    $accueil = new \App\Controller\visitorController();
    $accueil-> affichageEvent();
}
