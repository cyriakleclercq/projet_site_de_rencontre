<?php


namespace App\model;


use Exception;
use PDO;

class visitor
{

    protected $bdd;
    protected $sql;
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

    public function getEvent()
    {
        $this->eventList = $this->bdd->query("select * from events")->fetchAll(PDO::FETCH_OBJ);
        return $this->eventList;
    }


    public function set_inscription($name, $surname, $sexe, $mail, $age, $city, $pseudo, $about, $password)
    {
        $this->sql = $this->bdd->prepare("INSERT INTO `users` (`name`,`surname`,`sexe`,`mail`,`age`,`city`,`pseudo`,`about`,`password`) VALUE (?,?,?,?,?,?,?,?,?)");
        $this->sql->bindParam(1, $name);
        $this->sql->bindParam(2, $surname);
        $this->sql->bindParam(3,$sexe);
        $this->sql->bindParam(4, $mail);
        $this->sql->bindParam(5, $age);
        $this->sql->bindParam(6, $city);
        $this->sql->bindParam(7, $pseudo);
        $this->sql->bindParam(8, $about);
        $this->sql->bindParam(9, sha1($password));
        $this->sql->execute();
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
}