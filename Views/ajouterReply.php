<?php
require '../Model/reply.php'; 
require '../Controller/replyC.php';
session_start();
if (isset($_POST['text'])) {
    # code...
    $username_reply=$_SESSION['name'];
    $text_reply=$_POST['text'];
    $reply = new reply($username_reply,$text_reply);
    $replyC = new replyC();
    $replyC->ajouterReply($reply);
    header('Location: Answers.php');
}else {
    echo 'chyy';
}