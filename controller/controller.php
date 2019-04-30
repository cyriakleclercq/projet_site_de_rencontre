<?php


namespace App\controller;


use App\model\model;

class controller
{
    protected $model;
    protected $id_user;
    protected $mail;

    public function __construct()
    {
        $this->model = new model();

        session_start();

        $this->id_user = $_SESSION['id_user'];
        filter_var($this->id_user,FILTER_SANITIZE_NUMBER_INT);

        $this->mail = "Render@gmail.com";

    }


    public function affichage ()
    {

        if (isset($_REQUEST['filtre']) && !empty($_REQUEST['filtre']))
        {
            $city = $_REQUEST['filtre'];
            filter_var($city,FILTER_SANITIZE_STRING);

            $listeEvents = $this->model->getEventFiltre($city);

        } else {

            $listeEvents = $this->model->getEvent();
        }



        include "vu/homePage.php";
    }
}