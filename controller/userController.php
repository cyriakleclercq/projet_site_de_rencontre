<?php


namespace App\controller;


use App\model\user;

class userController
{

    private $logout;
    private $model;

    public function __construct()
    {
        $this->model = new user();
    }

    public function affichageUser ()
    {
        $listeUsers = $this->model->getUser();

        include "vu/users.php";
    }

    public function logout ()
    {
        $this->logout = $this->model->logout();

        $this->affichageUser();
    }
}