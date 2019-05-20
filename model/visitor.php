<?php


namespace App\model;

include 'model.php';

use App\controller\ajaxController;
use PDO;

class visitor extends model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEventFiltre($city)
    {
        $this->eventList = $this->bdd->query("select * from events where `city` = '$city'")->fetchAll(PDO::FETCH_OBJ);
        return $this->eventList;
    }


    public function set_inscription($name, $surname, $sexe, $mail, $age, $city, $pseudo, $about, $password)
    {
        $pass = sha1($password);

        $this->sql = $this->bdd->prepare("INSERT INTO `users` (`name`,`surname`,`sexe`,`mail`,`age`,`city`,`pseudo`,`about`,`password`) VALUE (?,?,?,?,?,?,?,?,?)");
        $this->sql->bindParam(1, $name);
        $this->sql->bindParam(2, $surname);
        $this->sql->bindParam(3,$sexe);
        $this->sql->bindParam(4, $mail);
        $this->sql->bindParam(5, $age);
        $this->sql->bindParam(6, $city);
        $this->sql->bindParam(7, $pseudo);
        $this->sql->bindParam(8, $about);
        $this->sql->bindParam(9, $pass);
        $this->sql->execute();
        return array('name'=>$name, 'surname'=>$surname);
    }

    public function check_inscription ($pseudo, $mail)
    {
        $this->sql = $this->bdd->query("SELECT * from users WHERE `pseudo` = '$pseudo' OR `mail` = '$mail'");
        $this->sql = $this->sql->fetch();

        if ($pseudo == $this->sql['pseudo'])
        {
            return 1;
        }

        else if ($mail == $this->sql['mail'])
        {
            return 2;
        }

        else if ($mail !== $this->sql['mail'] AND $pseudo !== $this->sql['pseudo'])
        {
            return 0;
        }

    }



    public function check_login ($pseudo, $password)
    {
        $this->sql = $this->bdd->query("SELECT * from users where `pseudo` = '$pseudo' and `password` = '$password'");
        $this->sql = $this->sql->fetch();

        if ($pseudo == $this->sql['pseudo'] and $password == $this->sql['password'])
        {
            session_start();

            $_SESSION['id_user'] = $this->sql['id_user'];
            $_SESSION['name'] = $this->sql['name'];
            $_SESSION['surname'] = $this->sql['surname'];
            $_SESSION['sexe'] = $this->sql['sexe'];
            $_SESSION['mail'] = $this->sql['mail'];
            $_SESSION['age'] = $this->sql['age'];
            $_SESSION['city'] = $this->sql['city'];
            $_SESSION['pseudo'] = $this->sql['pseudo'];
            $_SESSION['about'] = $this->sql['about'];
            $_SESSION['password'] = $this->sql['password'];
            $_SESSION['rank'] = $this->sql['rank'];
        } else {

            return 1;
        }

    }

    public function checkmail ($mail)
    {
        $this->sql = $this->bdd->query("SELECT * from users WHERE `mail` = '$mail'");
        $this->sql = $this->sql->fetch();

        if ($mail == $this->sql['mail'])
        {

            return 1;

        } else {

            return 0;

        }
    }

    public function updateToken ($mail, $token)
    {
        $this->sql = "UPDATE `users` SET `token` = ? WHERE `mail` = ?";
        $this->bdd->prepare($this->sql)->execute([$token, $mail]);
    }

    public function envoiemail ($by, $mail, $token)
    {

        $message= '<a href="http://localhost:8000/index.php?controller=visitor&action=modifPassword&token='.$token.'"> modifier votre mot de passe </a>';

        $titre= "modification de mot de passe";

        $recepteur = $mail;

        $headers = 'From:'.$by . "\r\n" .
            'Reply-To:'.$by . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($recepteur,$titre, $message, $headers);

    }

    public function newPassword ($password, $token)
    {
        $pass = sha1($password);
        $this->sql = "UPDATE `users` SET `password` = ?, `token` = null WHERE `token` = ?";
        $this->bdd->prepare($this->sql)->execute([$pass, $token]);
    }
}