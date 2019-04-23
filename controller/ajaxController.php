<?php


namespace App\controller;


use App\model\ajax;


class ajaxController
{

    private $model;
    private $id;

    public function __construct ()
    {
        $this->model = new ajax();
}

    public function ajaxCommentaire ()
    {

        if ($_GET['postTitle'] != null && $_GET['postCommentaire'] != null) {
            $this->ajaxPost();
        }

        $this->id = $_REQUEST['id_event'];
        $this->model->getCommentaire($this->id);
    }

    public function ajaxPost ()
    {

        $id_user = $_SESSION['id_user'];
        filter_var($id_user, FILTER_SANITIZE_NUMBER_INT);

        $id_event = $_REQUEST['id_event'];
        filter_var($id_event,FILTER_SANITIZE_NUMBER_INT);

        $title = $_REQUEST['postTitle'];
        filter_var($title,FILTER_SANITIZE_STRING);

        $comment = $_REQUEST['postCommentaire'];
        filter_var($comment,FILTER_SANITIZE_STRING);

        $add_comment = $this->model->setCommentaire($title, $comment, $id_event, $id_user);
    }

}