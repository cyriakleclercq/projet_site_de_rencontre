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

        case "user":
            require "model/user.php";
            require "controller/userController.php";

            switch ($_GET['action']) {

                case "logout":

                    $logout = new \App\Controller\userController();
                    $logout->logout();
            }

        }

} else {

    require "model/user.php";
    require "controller/userController.php";

    $accueil = new \App\Controller\userController();
    $accueil->affichageUser();
}
