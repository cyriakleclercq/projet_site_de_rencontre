<?php


namespace App\model;


use Exception;
use PDO;

class model
{
    protected $bdd;
    protected $sql;
    protected $id_user;
    protected $eventList;


    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=sitederencontre;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getEvent()
    {
        $this->eventList = $this->bdd->query("select * from events")->fetchAll(PDO::FETCH_OBJ);
        return $this->eventList;
    }
}