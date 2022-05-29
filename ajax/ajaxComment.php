<?php
    include_once(__DIR__ . "/../classes/Comment.php");

    if(!empty($_POST)){
        $c = new Comment();
        session_start();
        $c->setPostId($_POST['post_id']);
        $c->setText($_POST['text']);
        $c->setUserId($_SESSION['id']);

        $c->save();

        $response = [
           'status' => 'success',
           'body' => $c->getText(),
           'message' => 'comment saved'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }