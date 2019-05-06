<?php


namespace App\controller;

use App\model\admin;

require "userController.php";

class adminController extends userController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new admin();
    }

    // envoie vers la vue "editUser"

    public function editUserPage ()
    {
        include "vu/editUser.php";
    }

    // envoie vers la page "affichageUser" en affichant les utilisateurs

    public function affichageUser ()
    {
        $listeUsers = $this->model->getUser();
        include "vu/users.php";
    }

    // reçoit les infos de la page "editUser", les filtres et les envoies dans le model
    // redirige vers la methode "affichageUser"
    public function editUser ()
    {
        $id = $_REQUEST['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $name = $_REQUEST['name'];
        filter_var($name, FILTER_SANITIZE_STRING);

        $surname = $_REQUEST['surname'];
        filter_var($surname, FILTER_SANITIZE_STRING);

        $sexe = $_REQUEST['sexe'];
        filter_var($sexe,FILTER_SANITIZE_STRING);

        $mail = $_REQUEST['mail'];
        filter_var($mail, FILTER_SANITIZE_EMAIL);

        $age = $_REQUEST['age'];
        filter_var($age, FILTER_SANITIZE_NUMBER_INT);

        $city = $_REQUEST['city'];
        filter_var($city, FILTER_SANITIZE_STRING);

        $pseudo = $_REQUEST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var($password, FILTER_SANITIZE_STRING);

        $about = $_REQUEST['about'];
        filter_var($about, FILTER_SANITIZE_STRING);

        $rank = $_REQUEST['rank'];
        filter_var($rank, FILTER_SANITIZE_NUMBER_INT);

        if(!empty($id) && !empty($name) && !empty($surname) && !empty($sexe) && !empty($mail) && !empty($age) && !empty($city) && !empty($pseudo) && !empty($password) && !empty($rank)) {

            $edit_user = $this->model->setEditUser($id, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $rank);

            $this->affichageUser();

        }
    }

    // envoie vers la page "affichageEvent" et affiche tous les events
    public function affichageEvent ()
    {
        $events = $this->model->getAllEvent();
        include "vu/affichageEvent.php";
    }

    // supprime un utilisateur

    public function deleteUser ()
    {
        $id = $_REQUEST['id'];

        $supp_user = $this->model->deleteUser($id);

        $this->affichageUser();
    }

    // supprime un event

    public function deleteEvent ()
    {
        $id = $_REQUEST['id'];

        $this->model->deleteEvent($id);

        $this->affichageEvent();
    }


}