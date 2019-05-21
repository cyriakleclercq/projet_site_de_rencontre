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

    // renvoie vers la page d'inscription

    public function inscriptionPage ()
    {
        include "vu/inscription.php";
    }

    // renvoie vers la page modifPassword apres la reception d'un mail

    public function modifPassword ()
    {
        include "vu/modifPassword.php";
    }

    // renvoie vers la page de connexion

    public function connexionPage ()
    {
        include "vu/connexion.php";
    }

    // permet à l'utilisateur de se créer un compte

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

                $token = md5(time()."abcde012345".mt_rand(1,9999));


                $this->model->set_inscription($name, $surname, $sexe, $mail, $age, $city, $pseudo, $about, $password, $token);


                $this->model->validationMail($this->Sitemail, $mail, $token);



                $inscription = "Votre inscription a bien été prise en compte. veuillez la valider en cliquant sur le lien dans votre boite mail";

            } else {

                $inscription = "veuillez remplir les champs obligatoires";
            }

            include "vu/validation.php";

        }

    }

    public function validation ()
    {
        $token = $_REQUEST['token'];
        filter_var($token, FILTER_SANITIZE_STRING);

        $this->model->validation($token);

        $valide = "vous pouvez désormais vous connecter";

        include "vu/validation.php";
    }

    // permet à l'utilisateur de se logger

    public function login ()
    {
        $pseudo = $_REQUEST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var(password, FILTER_SANITIZE_STRING);
        $pass = sha1($password);

        $check_user =$this->model->check_login($pseudo, $pass);

        if ($check_user == 1) {

            $alert = 'login incorrect ou non validé';
            include "vu/connexion.php";
        }

        else {

            $this->affichage();
        }
    }

    //

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
            $token = md5(time()."abcde012345".mt_rand(1,9999));

            $this->model->updateToken($mail,$token);


            $this->model->envoiemail($this->Sitemail,$mail, $token);

            $reponse = "Un lien pour modifier votre mot de passe a été envoyé sur votre boite mail";

            include "vu/lostPassword.php";

        } else if ($check == 0)
        {
            $reponse = "adresse mail introuvable";

            include "vu/lostPassword.php";
        }
    }

    public function newPassword ()
    {

        $token = $_REQUEST['token'];
        filter_var($token,FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var($password,FILTER_SANITIZE_STRING);

        $this->model->newPassword($password, $token);

        $validationPassword = "Vous avez bien changé votre mot de passe";

        include "vu/validation.php";
    }

}