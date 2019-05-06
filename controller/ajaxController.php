<?php


namespace App\controller;


use App\model\ajax;


class ajaxController
{

    private $model;

    public function __construct ()
    {
        $this->model = new ajax();
}

    // affiche tous les commentaires d'un event et check la reception d'un commentaire
    // en cas de reception d'un commentaire, instancie la methode ajaxpost

    public function ajaxCommentaire ()
    {

        if (!empty($_GET['postCommentaire']))
        {
            $this->ajaxPost();
        }

        $id = $_REQUEST['id_event'];
        $this->model->getCommentaire($id);
    }

    // envoi un commentaire dans le model
    public function ajaxPost ()
    {

        $id_user = $_SESSION['id_user'];
        filter_var($id_user, FILTER_SANITIZE_NUMBER_INT);

        $id_event = $_REQUEST['id_event'];
        filter_var($id_event,FILTER_SANITIZE_NUMBER_INT);

        $comment = $_REQUEST['postCommentaire'];
        filter_var($comment,FILTER_SANITIZE_STRING);

        $this->model->setCommentaire($comment, $id_event, $id_user);
    }

}