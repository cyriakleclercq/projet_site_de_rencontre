<?php


namespace App\Controller;


use App\model\visitor;

class visitorController
{
    private $model;
    private $name;
    private $surname;
    private $mail;
    private $age;
    private $city;
    private $pseudo;
    private $about;
    private $password;
    private $add_user;
    private $check_user;


    public function __construct()
    {
        $this->model = new visitor();
    }

    public function affichageUser ()
    {
        $listeUsers = $this->model->getUser();

        include "vu/users.php";
    }


    public function inscription ()
    {

        $this->name = $_REQUEST['name'];
        filter_var($this->name,FILTER_SANITIZE_STRING);

        $this->surname = $_REQUEST['surname'];
        filter_var($this->surname,FILTER_SANITIZE_STRING);

        $this->mail = $_REQUEST['mail'];
        filter_var($this->mail,FILTER_SANITIZE_EMAIL);

        $this->age = $_REQUEST['age'];
        filter_var($this->age,FILTER_SANITIZE_NUMBER_INT);

        $this->city = $_REQUEST['city'];
        filter_var($this->city,FILTER_SANITIZE_STRING);

        $this->pseudo = $_REQUEST['pseudo'];
        filter_var($this->pseudo,FILTER_SANITIZE_STRING);

        $this->about = $_REQUEST['about'];
        filter_var($this->about,FILTER_SANITIZE_STRING);

        $this->password = $_REQUEST['password'];
        filter_var($this->name,FILTER_SANITIZE_STRING);

        $this->add_user = $this->model->set_inscription($this->name, $this->surname, $this->mail, $this->age, $this->city, $this->pseudo, $this->about, $this->password);

        $this->affichageUser();
    }

    public function login ()
    {
        $this->pseudo = $_REQUEST['pseudo'];
        filter_var($this->pseudo, FILTER_SANITIZE_STRING);

        $password = $_REQUEST['password'];
        filter_var(password, FILTER_SANITIZE_STRING);
        $this->password = sha1($password);

        $this->check_user =$this->model->check_login($this->pseudo, $this->password);

        $this->affichageUser();
    }

}