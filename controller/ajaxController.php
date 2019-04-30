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

    public function ajaxCommentaire ()
    {

        if (!empty($_GET['postCommentaire']))
        {
            $this->ajaxPost();
        }

        $id = $_REQUEST['id_event'];
        $this->model->getCommentaire($id);
    }

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