<?php


namespace App\model;


use Exception;
use PDO;

class user
{
    private $bdd;
    private $userList;



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

    public function logout ()
    {
        session_start();

        session_destroy();
    }
}