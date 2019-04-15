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

        $this->affichageEvent();
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

        $this->affichageUser();
    }
}