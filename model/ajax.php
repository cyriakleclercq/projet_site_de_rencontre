<?php


namespace App\model;


use Exception;
use PDO;

class ajax
{
    private $event;
    private $bdd;
    private $sql;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=sitederencontre;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getCommentaire($id)
    {
        $this->event = $this->bdd->query("select users.pseudo, users.sexe, users.age, comments.id_user, comments.id_event, comments.id_comment, comments.comment, comments.date from comments, users where `id_event` = $id and comments.id_user = users.id_user")->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($this->event);

    }

    public function setCommentaire ($comment, $id_event, $id_user)
    {
        $this->sql = $this->bdd->prepare("INSERT INTO `comments` (`comment`,`id_event`,`id_user`) VALUE (?,?,?)");
        $this->sql->bindParam(1, $comment);
        $this->sql->bindParam(2, $id_event);
        $this->sql->bindParam(3, $id_user);
        $this->sql->execute();

    }


}