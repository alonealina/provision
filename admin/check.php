<?php
    $login_id = isset($_POST['login_id'])? htmlspecialchars($_POST['login_id'], ENT_QUOTES, 'utf-8') : '';
    $password = isset($_POST['password'])? htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'): '';

    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
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
