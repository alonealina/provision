<?php
try {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
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

