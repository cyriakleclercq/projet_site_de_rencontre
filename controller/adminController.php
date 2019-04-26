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

    public function editUserPage ()
    {
        include "vu/editUser.php";
    }

    public function editEventPage ()
    {
        include "vu/editEvent.php";
    }

    public function affichageUser ()
    {
        $listeUsers = $this->model->getUser();
        include "vu/users.php";
    }

    public function editEvent ()
    {

        $id = $_REQUEST['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $title = $_REQUEST['title'];
        filter_var($title,FILTER_SANITIZE_STRING);

        $place = $_REQUEST['place'];
        filter_var($place,FILTER_SANITIZE_STRING);

        $city = $_REQUEST['city'];
        filter_var($city,FILTER_SANITIZE_STRING);

        $event_describe = $_REQUEST['event_describe'];
        filter_var($event_describe,FILTER_SANITIZE_STRING);

        $number_of_places = $_REQUEST['number_of_places'];
        filter_var($number_of_places,FILTER_SANITIZE_NUMBER_INT);

        $date = $_REQUEST['date'];
        filter_var($date,FILTER_SANITIZE_STRING);

        $hours = $_REQUEST['hours'];
        filter_var($hours, FILTER_SANITIZE_STRING);

        if (!empty($id) && !empty($title) && !empty($place) && !empty($city) && !empty($event_describe) && !empty($number_of_places) && !empty($date) && !empty($hours)) {


            $add_event = $this->model->setEditEvent($id, $title, $place, $city, $event_describe, $number_of_places, $date, $hours);

            $this->affichageEvent();
        }
    }

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

      //  if(!empty($id) && !empty($name) && !empty($surname) && !empty($sexe) && !empty($mail) && !empty($age) && !empty($city) && !empty($pseudo) && !empty($password) && !empty($rank)) {

            $edit_user = $this->model->setEditUser($id, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $rank);

            $this->affichageUser();

    //    }
    }

    public function deleteUser ()
    {
        $id = $_REQUEST['id'];

        $supp_user = $this->model->deleteUser($id);

        $this->affichageUser();
    }
}