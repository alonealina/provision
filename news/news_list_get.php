<?php
try {
    $page = $_GET['page'];
    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $qry = $pdo->prepare('select * from news LIMIT 0, 10');
    $qry->execute();
    $html = '';
    foreach($qry->fetchAll() as $row){
        $html .= '<tr class=" show" onclick="clickNews('. $row["id"] .')">
        <th>' . $row["notice_date"] . '</th>
        <td>' . $row["title"] . '</td></tr>';
    }
    echo json_encode($html);
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>
