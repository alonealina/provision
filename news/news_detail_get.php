<?php
try {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $qry = $pdo->prepare('select * from news WHERE id = '. $id);
    $qry->execute();
    $html = '<tr class=" show news_detail_header">';
    foreach($qry->fetchAll() as $row){
        $html .= '<th>'.$row["notice_date"].'</th>'.
            '<td>'.$row["title"].'</td></tr>'.
            '<tr class=" show news_detail_content">'.
            '<th class="sp_none"></th>'.
            '<td>'.$row["content"].'</td></tr>';
    }
    echo json_encode(nl2br($html));
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>

