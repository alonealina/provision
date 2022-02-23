<?php
try {
    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
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
