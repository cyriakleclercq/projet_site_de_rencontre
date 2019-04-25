<?php


namespace App\controller;


use App\model\visitor;

class controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new visitor();
    }


    public function affichage ()
    {

        $listeEvents = $this->model->getEvent();

        include "vu/homePage.php";
    }
}