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

    public function setEditEvent ($id_user, $id_event, $title, $place, $city, $event_describe, $nbr, $date, $hours)
    {
        $this->sql = "UPDATE `events` SET `title` = ?,`place` = ?, `city` = ?, `event_describe` = ?, `number_of_places` = ?, `date` = ?, `hours` = ? WHERE id_event = ? AND id_user = ?";
        $this->bdd->prepare($this->sql)->execute([$title, $place, $city, $event_describe, $nbr, $date, $hours, $id_event, $id_user]);
    }

    public function setEditProfil ($id, $name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about)
    {
        $this->sql = "UPDATE `users` SET `name` = ?,`surname` = ?, `sexe` = ?, `mail` = ?, `age` = ?, `city` = ?, `pseudo` = ?, `password` = ?, `about` = ?    WHERE id_user = ?";
        $this->bdd->prepare($this->sql)->execute([$name, $surname, $sexe, $mail, $age, $city, $pseudo, $password, $about, $id]);
    }

    public function setEditComment ($id_user, $id_comment, $comment)
    {
        $this->sql = "UPDATE `comments` SET `comment` = ? WHERE `id_user` = ? AND `id_comment` = ?";
        $this->bdd->prepare($this->sql)->execute([$comment, $id_user, $id_comment]);
    }

    public function setMail ($by,$titre,$message)
    {
        $headers = 'From:'.$by . "\r\n" .
            'Reply-To:'.$by . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($this->recepteur,$titre, $message, $headers);
    }

    public function deleteComm ($id_comment)
    {
        $this->sql = $this->bdd->query("delete from comments where id_comment = $id_comment");
        $this->sql->execute();
    }

    public function checkComm ($id_user, $id_comment)
    {
        $this->sql = $this->bdd->query("select * from `comments` where id_user = '$id_user' and id_comment = '$id_comment'");
        $this->sql = $this->sql->fetch();

        if ($id_user == $this->sql['id_user'] AND $id_comment == $this->sql['id_comment'])
        {
            return 1;

        } else {

            return 0;

        }
    }

    public function getSearchUser ($pseudo)
    {
        $search = $this->bdd->query("select * from `users` where `pseudo` = '$pseudo'")->fetchAll(PDO::FETCH_OBJ);
        return $search;

    }

    public function setFriend ($id_user, $id_friend)
    {
        $this->sql = $this->bdd->prepare("INSERT INTO `friends` (`id_request`,`id_receive`) VALUE (?,?)");
        $this->sql->bindParam(1,$id_user);
        $this->sql->bindParam(2,$id_friend);
        $this->sql->execute();
    }

    public function getReceive ($id_user)
    {
        $check = $this->bdd->query("select * from friends as a, users as b where a.id_request = b.id_user and  a.id_receive = '$id_user' and `validation` is NULL")->fetchAll(PDO::FETCH_OBJ);
        return $check;
    }

    public function setEditFriend ($id_user, $id_friend)
    {
        $this->sql = "UPDATE `friends` SET `validation` = ? WHERE `id_receive` = ? AND `id_request` = ?";
        $this->bdd->prepare($this->sql)->execute([1, $id_user, $id_friend]);
    }

    public function getFriends ($id_user)
    {
        $friends = $this->bdd->query("select * from friends as a, users as b where (a.id_request = b.id_user and a.id_receive = '$id_user' and `validation` = '1') or (a.id_receive = b.id_user and a.id_request = '$id_user' and `validation` = '1')")->fetchAll(PDO::FETCH_OBJ);
        return $friends;
    }

    public function refuseFriend ($id_user, $id_friend)
    {
        $this->sql = $this->bdd->query("delete from friends where id_request = $id_friend and id_receive = $id_user");
        $this->sql->execute();
    }

    public function checkFriend ($id_user, $pseudo)
    {
        $this->sql = $this->bdd->query("select * from `friends` as a, `users` as b where (a.id_receive = '$id_user' and a.id_request = b.id_user and b.pseudo = '$pseudo') or (a.id_request = '$id_user' and a.id_receive = b.id_user and b.pseudo = '$pseudo') ");
        $this->sql = $this->sql->fetch();

        if ($id_user == $this->sql['id_receive'] OR $id_user == $this->sql['id_request'])
        {
            return 1;

        }
    }

    public function checkVosEvent ($id_user, $friend)
    {
        $this->sql = $this->bdd->query("select * from `friends` where (id_receive = '$id_user'  and id_request = '$friend' and `validation` = '1') or (id_request = '$id_user' and id_receive = '$friend' and `validation` = '1') ");
        $this->sql = $this->sql->fetch();

        if ($id_user == $this->sql['id_receive'] OR $id_user == $this->sql['id_request'])
        {
            return 1;

        }
    }
}