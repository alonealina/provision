<?php
try {
    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
    $sql = "DELETE FROM news WHERE id = :id";
    $qry = $pdo->prepare($sql);
    $params = array(':id' => $id);
    $qry->execute($params);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $pdo = null;
}
header("Location:../news_list.html");

?>
