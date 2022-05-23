<?php
    include_once(__DIR__ . "/../classes/Comment.php");

    if(!empty($_POST)){
        // nieuwe comment
        $c = new Comment();
        session_start();
        $c->setPostId($_POST['post_id']);
        $c->setText($_POST['text']);
        $c->setUserId($_SESSION['id']);//uit session id halen!! zodat hackers er niet aankunnen, daarom niet uit post
        //save()
        $c->save();

        //succes boodschap
        $response = [
           'status' => 'success',
           'body' => htmlspecialchars($c->getText()), //specialchars om scripts te injecteren
           'message' => 'comment saved'
        ];

        header('Content-Type: application/json');
        echo json_encode($response); // dit maakt {'status': 'success', body, message etc}
    }