<?php


namespace App\Controller;


use App\model\visitor;

class visitorController
{
    private $model;
    private $check_user;


    public function __construct()
    {
        $this->model = new visitor();
    }

    public function inscriptionPage ()
    {
        include "vu/inscription.php";
    }

    public function connexionPage ()
    {
        include "vu/connexion.php";
    }

    public function affichageEvent ()
    {
        $listeEvents = $this->model->getEvent();
        include "vu/homePage.php";

    }

    public function inscription ()
    {

        $name = $_REQUEST['name'];
        filter_var($name,FILTER_SANITIZE_STRING);

        $surname = $_REQUEST['surname'];
        filter_var($surname,FILTER_SANITIZE_STRING);

        $mail = $_REQUEST['mail'];
        filter_var($mail,FILTER_SANITIZE_EMAIL);

        $sexe = $_REQUEST['sexe'];
        filter_var($sexe, FILTER_SANITIZE_STRING);

        $age = $_REQUEST['age'];
        filter_var($age,FILTER_SANITIZE_NUMBER_INT);

        $city = $_REQUEST['city'];
        filter_var($city,FILTER_SANITIZE_STRING);

        $pseudo = $_REQUEST['pseudo'];
        filter_var($pseudo,FILTER_SANITIZE_STRING);

        $about = $_REQUEST['about'];
        filter_var($about,FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var($name,FILTER_SANITIZE_STRING);

        $add_user = $this->model->set_inscription($name, $surname,$sexe, $mail, $age, $city, $pseudo, $about, $password);

        $this->connexionPage();
    }

    public function login ()
    {
        $pseudo = $_REQUEST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var(password, FILTER_SANITIZE_STRING);
        $pass = sha1($password);

        $this->check_user =$this->model->check_login($pseudo, $pass);

        $this->affichageEvent();
    }

}