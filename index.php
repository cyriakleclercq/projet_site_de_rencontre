<?php

if (isset($_GET['controller'])) {

    session_start();

    switch ($_GET['controller']) {

        case "visitor":
            require "model/visitor.php";
            require "controller/visitorController.php";

            switch ($_GET['action']) {

                case "inscriptionPage":

                    $inscriptionPage = new \App\Controller\visitorController();
                    $inscriptionPage->inscriptionPage();
                    break;

                case "connexionPage":

                    $connexionPage = new \App\Controller\visitorController();
                    $connexionPage->connexionPage();
                    break;



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

            require "model/user.php";
            require "controller/userController.php";

            switch ($_GET['action']) {

                case "createPage":

                    $createPage = new \App\controller\userController();
                    $createPage->createPage();
                    break;

                case "editVosEventPage":

                    $editVosEventPage = new \App\controller\userController();
                    $editVosEventPage->editVosEvent();
                    break;

                case "PagedeContact":

                    $contact = new \App\controller\userController();
                    $contact->contactPage();
                    break;

                case "logout":

                    $logout = new \App\Controller\userController();
                    $logout->logout();
                    break;

                case "create":

                    $create = new \App\controller\userController();
                    $create->createEvent();
                    break;

                case "editUser":

                    $editUser = new \App\controller\userController();
                    $editUser->editUser();
                    break;

                case "deleteEvent":

                    $deleteEvent = new \App\controller\userController();
                    $deleteEvent->deleteEvent();
                    break;

                case "vosEvent":

                    $vosEvent = new \App\controller\userController();
                    $vosEvent->vosEvent();
                    break;

                case "editVosEvent":

                    $editVosEvent = new \App\controller\userController();
                    $editVosEvent->editVosEvent();
                    break;

                case "details":

                    $detail = new \App\controller\userController();
                    $detail->details();
                    break;

                case "profil":

                    $profil = new \App\controller\userController();
                    $profil->profil();
                    break;

                case "editProfilPage":

                    $editProfilPage = new \App\controller\userController();
                    $editProfilPage->editProfilPage();
                    break;

                case "editProfil":

                    $editProfil = new \App\controller\userController();
                    $editProfil->editProfil();
                    break;

                case "deleteProfil":

                    $deleteProfil = new \App\controller\userController();
                    $deleteProfil->deleteProfil();
                    break;

                case "mail":

                    $mail = new \App\controller\userController();
                    $mail->mail();
                    break;

                case "participation":

                    $participation = new \App\controller\userController();
                    $participation->participation();
                    break;

                case "abandon":

                    $abandon = new \App\controller\userController();
                    $abandon->abandon();
                    break;

        }
        break;

        case "admin":

            require "model/admin.php";
            require "controller/adminController.php";

            switch ($_GET['action']) {

                case "editEventPage":

                    $editEventPage = new \App\controller\adminController();
                    $editEventPage->editEventPage();
                    break;

                case "editEvent":

                    $editEvent = new \App\controller\adminController();
                    $editEvent->editEvent();
                    break;

                case "editUserPage":

                    $editUserPage = new \App\controller\adminController();
                    $editUserPage->editUserPage();
                    break;

                case "affichageUser":

                    $affichage = new \App\controller\adminController();
                    $affichage->affichageUser();
                    break;

                case "affichageEvent":

                    $affichageEvent = new \App\controller\adminController();
                    $affichageEvent->affichage();
                    break;

                case "deleteUser":

                    $deleteUser = new \App\controller\adminController();
                    $deleteUser->deleteUser();
                    break;

            }
            break;

        case "ajax":

            require "model/ajax.php";
            require "controller/ajaxController.php";

            $commentaire = new \App\controller\ajaxController();
            $commentaire->ajaxCommentaire();
            break;

    }


} else {

    require "model/visitor.php";
    require "controller/visitorController.php";

    $accueil = new \App\Controller\visitorController();
    $accueil-> affichage();
}
