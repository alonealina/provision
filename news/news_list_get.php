<?php
try {
    $page = $_GET['page'];
    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
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
