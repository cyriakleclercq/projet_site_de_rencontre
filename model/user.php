<?php


namespace App\model;


use Exception;
use PDO;

class user
{
    private $bdd;
    private $userList;
    private $sql;
    private $eventList;



    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=sitederencontre;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getUser()
    {
        $this->userList = $this->bdd->query("select * from users")->fetchAll(PDO::FETCH_OBJ);
        return $this->userList;
    }

    public function getEvent()
    {
        $this->eventList = $this->bdd->query("select * from events")->fetchAll(PDO::FETCH_OBJ);
        return $this->eventList;
    }

    public function logout ()
    {
        session_start();

        session_destroy();
    }

    public function setEvent ($title, $place, $city, $event_describe, $number_of_places, $date, $hours, $id_user)
    {
        $this->sql = $this->bdd->prepare("INSERT INTO `events` (`title`,`place`,`city`,`event_describe`,`number_of_places`,`date`,`hours`,`id_user`) VALUE (?,?,?,?,?,?,?,?)");
        $this->sql->bindParam(1, $title);
        $this->sql->bindParam(2, $place);
        $this->sql->bindParam(3, $city);
        $this->sql->bindParam(4, $event_describe);
        $this->sql->bindParam(5, $number_of_places);
        $this->sql->bindParam(6, $date);
        $this->sql->bindParam(7, $hours);
        $this->sql->bindParam(8, $id_user);
        $this->sql->execute();

    }
}