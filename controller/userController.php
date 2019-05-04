<?php


namespace App\controller;

require "controller.php";
use App\model\user;

class userController extends controller
{

    private $id_event;

    public function __construct()
    {
        parent::__construct();
        $this->model = new user();
    }

    public function homePage ()
    {
        include "vu/homePage.php";
    }

    public function contactPage ()
    {
        include "vu/contact.php";
    }

    public function createPage ()
    {
        include "vu/create.php";
    }

    public function edit ()
    {
        include "vu/edit.php";
    }

    public function vosEvent ()
    {
        $listEvents = $this->model->getVosEvent($this->id_user);

        include "vu/vosEvent.php";
    }

    public function vosSorties ()
    {
        if ($_REQUEST['id_user'])
        {

            $id_user = $_REQUEST['id_user'];
            filter_var($id_user,FILTER_SANITIZE_NUMBER_INT);

            $checkVosEvent = $this->model->checkVosEvent($this->id_user,$id_user);

            if ($checkVosEvent) {

                $listSorties = $this->model->getSorties($id_user);
            }



        } else {

            $listSorties = $this->model->getSorties($this->id_user);
        }

        include "vu/vosSorties.php";
    }

    public function logout ()
    {
        $this->model->logout();

        $logout = "vous êtes déconnecté";

        include "vu/validation.php";

    }

    public function deleteEvent ()
    {
        $id = $_REQUEST['id'];

        $this->model->deleteEvent($id);

        $this->vosEvent();
    }

    public function createEvent ()
    {

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

        if (!empty($title) && !empty($place) && !empty($city) && !empty($event_describe) && !empty($number_of_places) && !empty($date) && !empty($hours))
        {

            $add_event = $this->model->setEvent($title, $place, $city, $event_describe, $number_of_places, $date, $hours, $this->id_user);

            $check_id = $this->model->autoParticipation($this->id_user);

            $check = $check_id->id_event;

            $add_participant = $this->model->setParticipation($this->id_user, (int)$check);

            $create = "Votre évènement a bien été créé";


        } else {

            $create = "veuillez remplir tous les champs demandés";
        }

        include "vu/validation.php";

    }

    public function editEvent ()
    {


        $id_event = $_REQUEST['id_event'];
        filter_var($id_event, FILTER_SANITIZE_NUMBER_INT);

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

        if (!empty($id_event) && !empty($title) && !empty($place) && !empty($city) && !empty($event_describe) && !empty($number_of_places) && !empty($date) && !empty($hours)) {

            $this->model->setEditEvent($this->id_user, $id_event, $title, $place, $city, $event_describe, $number_of_places, $date, $hours);


            $editEvent = "votre Event a bien été modifié";


        } else {

            $editEvent = "veuillez remplir tous les champs";

        }

        include "vu/validation.php";

    }

    public function details ()
    {
        $id_event = $_REQUEST['id_event'];
        filter_var($id_event,FILTER_SANITIZE_NUMBER_INT);

        $details = $this->model->getDetail($id_event);

        $adherents = $this->model->getAdhesion($id_event);

        $participations = $this->model->getParticipation($id_event,$this->id_user);

        $participants = $this->model->getParticipant($id_event);

        include "vu/thisEvent.php";

    }

    public function profil ()
    {
        $profil = $this->model->getProfil($this->id_user);

        $check = $this->model->getReceive($this->id_user);

        $friends = $this->model->getFriends($this->id_user);


        if (isset($_REQUEST['pseudo'])) {

            $pseudo = $_REQUEST['pseudo'];
            filter_var($pseudo, FILTER_SANITIZE_STRING);

            $checkFriend = $this->model->checkFriend($this->id_user,$pseudo);

            $search = $this->model->getSearchUser($pseudo);

            if ($search == null) {

                $reponse = "pseudo inconnu";

            }

        }

        include "vu/profil.php";

    }

    public function deleteFriend ()
    {
        $id_friend = $_REQUEST['id_friend'];
        filter_var($id_friend,FILTER_SANITIZE_NUMBER_INT);

        $this->model->deleteFriend($this->id_user, $id_friend);

        $this->profil();


    }


    public function confirm ()
    {

        $id_friend = $_REQUEST['id_friend'];
        filter_var($id_friend,FILTER_SANITIZE_NUMBER_INT);

        $this->model->setEditFriend($this->id_user, $id_friend);

        $this->profil();
    }


    public function editProfil ()
    {
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

        if (!empty($name) && !empty($surname) && !empty($sexe) && !empty($mail) && !empty($age) && !empty($city) && !empty($pseudo) && !empty($password)) {

            $edit_profil = $this->model->setEditProfil($this->id_user, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about);

            $profil = "Votre profil a bien été édité";

        } else {

            $profil = "veuillez remplir tous les champs";
        }

        include "vu/validation.php";
    }

    public function deleteProfil ()
    {

        $this->model->deleteProfil($this->id_user);

        $this->logout();
    }

    public function abandon ()
    {
        $id_event = $_REQUEST['id_event'];
        filter_var($id_event,FILTER_SANITIZE_NUMBER_INT);

        $delete = $this->model->deleteparticipation($this->id_user,$id_event);

        if (isset($_REQUEST['sortie'])) {

            $this->vosSorties();

        } else {

            $this->details();

        }
    }

    public function participation ()
    {
        $id_event = $_REQUEST['id_event'];
        filter_var($id_event, FILTER_SANITIZE_NUMBER_INT);

        $checkParticipant = $this->model->getParticipation($id_event, $this->id_user);

        if ($checkParticipant == null)
        {
            $participe = $this->model->setParticipation($this->id_user,$id_event);

        }

        $this->details();
    }

    public function mail ()
    {
        $titre = $_REQUEST['titre'];
        filter_var($titre,FILTER_SANITIZE_STRING);

        $message = $_REQUEST['message'];
        filter_var($message,FILTER_SANITIZE_STRING);

        if (!empty($titre) && !empty($message) && $message !== NULL) {

            $this->model->setMail($this->mail, $titre, $message);

            $contactClose = "Votre message a été envoyé";

        } else

        {
            $contactClose = "veuillez remplir tous les champs";
        }

        include "vu/validation.php";

    }

    public function deleteComm ()
    {


        $id_comment = $_REQUEST['id_comment'];
        filter_var($id_comment,FILTER_SANITIZE_NUMBER_INT);

        $id_event = $_REQUEST['id_event'];
        filter_var($id_event, FILTER_SANITIZE_NUMBER_INT);

        if (isset($_SESSION['rank']) && $_SESSION['rank'] == 2)
        {

            $this->model->deleteComm($id_comment);

        } else if(isset($_SESSION['rank']) && $_SESSION['rank'] == 1) {

            $reponse = $this->model->checkComm($this->id_user, $id_comment);

            if ($reponse == 1)
            {
                $this->model->deleteComm($id_comment);
            }


        }

        $this->details($id_event);
    }

    public function editComm ()
    {

        $id_comment = $_REQUEST['id_comment'];
        filter_var($id_comment,FILTER_SANITIZE_NUMBER_INT);

       $id_event = $_REQUEST['id_event'];
       filter_var($id_event, FILTER_SANITIZE_NUMBER_INT);

        $comm = $_REQUEST['comment'];
        filter_var($comm, FILTER_SANITIZE_STRING);

        if (!empty($id_comment) && !empty($id_event) && !empty($comm))
        {
            $this->model->setEditComment($this->id_user, $id_comment, $comm);

            $editComm = "votre commentaire a bien été édité";

        } else {

            $editComm = "veuillez remplir tous les champs";
        }


        include "vu/validation.php";

    }

    public function friend ()
    {
        $id_friend = $_REQUEST['id_friend'];
        filter_var($id_friend,FILTER_SANITIZE_NUMBER_INT);

        $this->model->setFriend($this->id_user, $id_friend);

        $this->profil();
    }

    public function refuseFriend ()
    {
        $id_friend = $_REQUEST['id_friend'];
        filter_var($id_friend,FILTER_SANITIZE_NUMBER_INT);

        $this->model->refuseFriend($this->id_user, $id_friend);

        $this->profil();

    }

}