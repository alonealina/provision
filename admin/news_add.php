<?php
try {
    $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8') : '';
    $content = isset($_POST['content'])? htmlspecialchars($_POST['content'], ENT_QUOTES, 'utf-8'): '';
    $release = isset($_POST['release'])? htmlspecialchars($_POST['release'], ENT_QUOTES, 'utf-8'): '';
    $release = $release == 'public' ? 1 : 0; 

    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
    $sql = "INSERT INTO news (title, content, release_flg, notice_date) VALUES (:title, :content, :release, now())";
    $qry = $pdo->prepare($sql);
    $params = array(':title' => $title, ':content' => $content, ':release' => $release);
    $qry->execute($params);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $pdo = null;
}
header("Location:./news_list.html");

?>
