<?php


namespace App\Controller;

require "controller.php";

use App\model\visitor;

class visitorController extends controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new visitor();

    }

    public function inscriptionPage ()
    {
        include "vu/inscription.php";
    }

    public function modifPassword ()
    {
        include "vu/modifPassword.php";
    }

    public function connexionPage ()
    {
        include "vu/connexion.php";
    }

    public function verifInscriptionPage ()
    {
        include "vu/verifInscription.php";
    }

    public function validationPassword ()
    {
        include "vu/validationPassword.php";
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

        $check_inscription = $this->model->check_inscription($pseudo, $mail);

        if ($check_inscription == 1)
        {
            $alert1 = "pseudo déjà utilisé";
            include "vu/inscription.php";
        }

        if ($check_inscription == 2)
        {
            $alert2 = "adresse mail déjà utilisée";
            include "vu/inscription.php";
        }

        if ($check_inscription == 0)
        {

            if (!empty($name) && !empty($surname) && !empty($sexe) && !empty($mail) && !empty($age) && !empty($city) && !empty($pseudo) && !empty($password))
            {

                $add_user = $this->model->set_inscription($name, $surname, $sexe, $mail, $age, $city, $pseudo, $about, $password);
                $this->verifInscriptionPage();
            }

        }

    }

    public function login ()
    {
        $pseudo = $_REQUEST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var(password, FILTER_SANITIZE_STRING);
        $pass = sha1($password);

        $check_user =$this->model->check_login($pseudo, $pass);

        if ($check_user == 1) {

            $alert = 'login incorrect';
            include "vu/connexion.php";
        }

        else {

            $this->affichage();
        }
    }

    public function lostPasswordPage ()
    {
        include "vu/lostPassword.php";
    }

    public function checkMail ()
    {
        $mail = $_REQUEST['mail'];
        filter_var($mail, FILTER_SANITIZE_EMAIL);

        $check = $this->model->checkmail($mail);

        if ($check == 1)
        {
            $this->model->envoiemail($mail);

            $reponse = "veuillez vérifier votre boite mail";

            include "vu/lostPassword.php";

        } else if ($check == 0)
        {
            $reponse = "adresse mail introuvable";

            include "vu/lostPassword.php";
        }
    }

    public function newPassword ()
    {

        $mail = $_REQUEST['mail'];
        filter_var($mail,FILTER_SANITIZE_EMAIL);

        $password = $_REQUEST['password'];
        filter_var($password,FILTER_SANITIZE_STRING);

        $this->model->newPassword($password, $mail);

        $this->validationPassword();
    }

}