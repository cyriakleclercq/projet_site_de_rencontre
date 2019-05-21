<?php


namespace App\controller;


use App\model\model;

class controller
{
    protected $model;
    protected $id_user;
    protected $mail;
    protected $Sitemail;
    protected $pseudo;

    public function __construct()
    {
        $this->model = new model();

        session_start();

        $this->id_user = $_SESSION['id_user'];
        filter_var($this->id_user,FILTER_SANITIZE_NUMBER_INT);

        $this->Sitemail = "Render@gmail.com";

        $this->mail = $_SESSION['mail'];
        filter_var($this->mail,FILTER_SANITIZE_EMAIL);

        $this->pseudo = $_SESSION['pseudo'];
        filter_var($this->pseudo,FILTER_SANITIZE_STRING);

    }

    // affiche les evenements dans la page d'accueil
    public function affichage ()
    {

        if (isset($_REQUEST['filtre']) && !empty($_REQUEST['filtre']))
        {
            $city = $_REQUEST['filtre'];
            filter_var($city,FILTER_SANITIZE_STRING);

            $listeEvents = $this->model->getEventFiltre($city);

        } else {
            // affiche les evenements en fonction de la ville que recherche l'utilisateur

            $listeEvents = $this->model->getEvent();
        }

        include "vu/homePage.php";
    }
}