<?php
    $login_id = isset($_POST['login_id'])? htmlspecialchars($_POST['login_id'], ENT_QUOTES, 'utf-8') : '';
    $password = isset($_POST['password'])? htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'): '';

    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $qry = $pdo->prepare('select COUNT(*) from adminuser where login_id = "'. $login_id . '" and password = "' . $password .'"');
    $qry->execute();
    $count = $qry->fetchColumn();

    if ($count >= 1) {
        session_start();
        $_SESSION['admin_login'] = true;
        header("Location:./news_list.html");
    } else {
        header("Location:./login.html");
        exit;
    }

?>
