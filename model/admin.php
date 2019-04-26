<?php


namespace App\model;

include "user.php";

class admin extends user
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setEditUser ($id, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $rank)
    {
        $this->sql = "UPDATE `users` SET `name` = ?,`surname` = ?, `sexe` = ?, `mail` = ?, `age` = ?, `city` = ?, `pseudo` = ?, `password` = ?, `about` = ?, `rank` = ?  WHERE id_user = ?";
        $this->bdd->prepare($this->sql)->execute([$name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $rank, $id]);
    }

    public function setEditEvent ($id, $title, $place, $city, $event_describe, $nbr, $date, $hours)
    {
        $this->sql = "UPDATE `events` SET `title` = ?,`place` = ?, `city` = ?, `event_describe` = ?, `number_of_places` = ?, `date` = ?, `hours` = ? WHERE id_event = ?";
        $this->bdd->prepare($this->sql)->execute([$title, $place, $city, $event_describe, $nbr, $date, $hours, $id]);
    }

}