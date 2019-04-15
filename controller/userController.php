<?php


namespace App\controller;


use App\model\user;

class userController
{

    private $logout;
    private $model;
    private $title;
    private $place;
    private $city;
    private $event_describe;
    private $number_of_places;
    private $date_event;
    private $id_user;
    private $add_event;
    private $hours_event;
    private $date;
    private $hours;
    private $id;
    private $supp_user;
    private $name;
    private $surname;
    private $mail;
    private $pseudo;
    private $age;
    private $password;
    private $about;
    private $edit_user;
    private $rank;


    public function __construct()
    {
        $this->model = new user();
    }

    public function affichageUser ()
    {
        $listeUsers = $this->model->getUser();

        include "vu/users.php";
    }


    public function affichage ()
    {
        $listeEvents = $this->model->getEvent();

        include "vu/homePage.php";
    }

    public function affichageEvent ()
    {
        $listeEvents = $this->model->getEvent();

        include "vu/affichageEvent.php";
    }

    public function logout ()
    {
        $this->logout = $this->model->logout();

        include "vu/deco.php";

    }

    public function deleteUser ()
    {
        $this->id = $_REQUEST['id'];

        $this->supp_user = $this->model->deleteUser($this->id);

        $this->affichageUser();
    }

    public function deleteEvent ()
    {
        $this->id = $_REQUEST['id'];

        $this->supp_user = $this->model->deleteEvent($this->id);

        $this->affichageEvent();
    }

    public function editUser ()
    {
        $this->id = $_REQUEST['id'];
        filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);

        $this->name = $_REQUEST['name'];
        filter_var($this->name, FILTER_SANITIZE_STRING);

        $this->surname = $_REQUEST['surname'];
        filter_var($this->surname, FILTER_SANITIZE_STRING);

        $this->mail = $_REQUEST['mail'];
        filter_var($this->mail, FILTER_SANITIZE_EMAIL);

        $this->age = $_REQUEST['age'];
        filter_var($this->age, FILTER_SANITIZE_NUMBER_INT);

        $this->city = $_REQUEST['city'];
        filter_var($this->city, FILTER_SANITIZE_STRING);

        $this->pseudo = $_REQUEST['pseudo'];
        filter_var($this->pseudo, FILTER_SANITIZE_STRING);

        $this->password = $_REQUEST['password'];
        filter_var($this->pseudo, FILTER_SANITIZE_STRING);

        $this->about = $_REQUEST['about'];
        filter_var($this->about, FILTER_SANITIZE_STRING);

        $this->rank = $_REQUEST['rank'];
        filter_var($this->rank, FILTER_SANITIZE_NUMBER_INT);

        $this->edit_user = $this->model->setEditUser($this->id, $this->name, $this->surname, $this->mail, $this->age, $this->city, $this->pseudo, $this->password, $this->about, $this->rank);

        $this->affichageUser();

    }

    public function createEvent ()
    {

        $this->title = $_REQUEST['title'];
        filter_var($this->title,FILTER_SANITIZE_STRING);

        $this->place = $_REQUEST['place'];
        filter_var($this->place,FILTER_SANITIZE_STRING);

        $this->city = $_REQUEST['city'];
        filter_var($this->city,FILTER_SANITIZE_STRING);

        $this->event_describe = $_REQUEST['event_describe'];
        filter_var($this->event_describe,FILTER_SANITIZE_STRING);

        $this->number_of_places = $_REQUEST['number_of_places'];
        filter_var($this->number_of_places,FILTER_SANITIZE_NUMBER_INT);

        $this->date = $_REQUEST['date'];
        filter_var($this->date_event,FILTER_SANITIZE_STRING);

        $this->hours = $_REQUEST['hours'];
        filter_var($this->hours_event, FILTER_SANITIZE_STRING);

        $this->id_user = $_SESSION['id_user'];
        filter_var($this->id_user,FILTER_SANITIZE_NUMBER_INT);

        $this->add_event = $this->model->setEvent($this->title, $this->place, $this->city, $this->event_describe, $this->number_of_places, $this->date, $this->hours, $this->id_user);

        $this->affichageEvent();
    }

    public function editEvent ()
    {

        $this->id = $_REQUEST['id'];
        filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);

        $this->title = $_REQUEST['title'];
        filter_var($this->title,FILTER_SANITIZE_STRING);

        $this->place = $_REQUEST['place'];
        filter_var($this->place,FILTER_SANITIZE_STRING);

        $this->city = $_REQUEST['city'];
        filter_var($this->city,FILTER_SANITIZE_STRING);

        $this->event_describe = $_REQUEST['event_describe'];
        filter_var($this->event_describe,FILTER_SANITIZE_STRING);

        $this->number_of_places = $_REQUEST['number_of_places'];
        filter_var($this->number_of_places,FILTER_SANITIZE_NUMBER_INT);

        $this->date = $_REQUEST['date'];
        filter_var($this->date_event,FILTER_SANITIZE_STRING);

        $this->hours = $_REQUEST['hours'];
        filter_var($this->hours_event, FILTER_SANITIZE_STRING);

        $this->add_event = $this->model->setEditEvent($this->id, $this->title, $this->place, $this->city, $this->event_describe, $this->number_of_places, $this->date, $this->hours);

        $this->affichageEvent();
    }


}