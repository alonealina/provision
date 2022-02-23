<?php
try {
    $id = $_POST['id'];
    $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8') : '';
    $content = isset($_POST['content'])? htmlspecialchars($_POST['content'], ENT_QUOTES, 'utf-8'): '';
    $release = isset($_POST['release'])? htmlspecialchars($_POST['release'], ENT_QUOTES, 'utf-8'): '';
    $release = $release == 'public' ? 1 : 0; 

    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $sql = "UPDATE news SET title = :title, content = :content, release_flg = :release, notice_date = now() WHERE id = :id";
    $qry = $pdo->prepare($sql);
    $params = array(':title' => $title, ':content' => $content, ':release' => $release, ':id' => $id);
    $qry->execute($params);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $pdo = null;
}
header("Location:../news_list.html");

?>
