<?php


namespace App\model;

include "visitor.php";

use PDO;

class user extends visitor
{


    private $recepteur;


    public function __construct()
    {
       parent::__construct();

        $this->recepteur ="cyriakleclercq@gmail.com";

    }

    public function getUser()
    {
        $userList = $this->bdd->query("select * from users")->fetchAll(PDO::FETCH_OBJ);
        return $userList;
    }

    public function getProfil($id)
    {
        $profil = $this->bdd->query("select * from users where `id_user` = $id")->fetchAll(PDO::FETCH_OBJ);
        return $profil;
    }

    public function autoParticipation ($id_user)
    {
        $this->sql = $this->bdd->query("SELECT id_event FROM `events` WHERE `id_user` = $id_user ORDER BY id_event DESC")->fetch(PDO::FETCH_OBJ);
        return $this->sql;
    }

    public function getDetail ($id)
    {
         $details = $this->bdd->query("select * from events where `id_event` = $id")->fetchAll(PDO::FETCH_OBJ);
         return $details;
    }

    public function getParticipation ($id_event, $id_user)
    {
        $participationList = $this->bdd->query("select * from participations where `id_event` = $id_event and `id_user` = $id_user")->fetchAll(PDO::FETCH_OBJ);
        return $participationList;
    }

    public function getParticipant ($id_event)
    {
        $participantList = $this->bdd->query("select * from `participations`as a, `users` as b where a.id_event = $id_event and a.id_user = b.id_user")->fetchAll(PDO::FETCH_OBJ);
        return $participantList;
    }

    public function getSorties ($id_user)
    {
        $sortiesList = $this->bdd->query("select * from `participations` as a, `events` as b, `users` as c where a.id_event = b.id_event and b.id_user = c.id_user and a.id_user = $id_user")->fetchALL(pdo::FETCH_OBJ);
        return $sortiesList;
    }

    public function getVosEvent ($id_user)
    {
        $vosEvent = $this->bdd->query("select * from `events` where events.id_user = $id_user")->fetchAll(PDO::FETCH_OBJ);
        return $vosEvent;
    }

    public function logout ()
    {
        session_start();

        session_destroy();
    }

    public function deleteUser($id)
    {
        $this->sql = $this->bdd->query("delete from users where id_user = $id");
        $this->sql->execute();
    }

    public function deleteparticipation($id_user,$id_event)
    {
        $this->sql = $this->bdd->query("delete from participations where `id_user` = $id_user and `id_event` = $id_event");
        $this->sql->execute();
    }

    public function deleteEvent($id)
    {
        $this->sql = $this->bdd->query("delete from events where id_event = $id");
        $this->sql->execute();
    }

    public function deleteProfil ($id)
    {
        $this->sql = $this->bdd->query("delete from users where id_user = $id");
        $this->sql->execute();
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

    public function setParticipation($id_user,$id_event)
    {
        $this->sql = $this->bdd->prepare("INSERT INTO `participations` (`id_user`,`id_event`) VALUE (?,?)");
        $this->sql->bindParam(1,$id_user);
        $this->sql->bindParam(2,$id_event);
        $this->sql->execute();
    }

    public function setEditVosEvent ($id, $title, $place, $city, $event_describe, $nbr, $date, $hours, $id_user)
    {
        $this->sql = "UPDATE `events` SET `title` = ?,`place` = ?, `city` = ?, `event_describe` = ?, `number_of_places` = ?, `date` = ?, `hours` = ? WHERE id_event = ? AND id_user = ?";
        $this->bdd->prepare($this->sql)->execute([$title, $place, $city, $event_describe, $nbr, $date, $hours, $id, $id_user]);
    }

    public function setEditProfil ($id, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about)
    {
        $this->sql = "UPDATE `users` SET `name` = ?,`surname` = ?, `sexe` = ?, `mail` = ?, `age` = ?, `city` = ?, `pseudo` = ?, `password` = ?, `about` = ?    WHERE id_user = ?";
        $this->bdd->prepare($this->sql)->execute([$name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $id]);
    }

    public function setMail ($by,$titre,$message)
    {
        $headers = 'From:'.$by . "\r\n" .
            'Reply-To:'.$by . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($this->recepteur,$titre, $message, $headers);
        echo"mail envoyé";
    }
}