<?php
try {
    $page = $_GET['page'];
    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $qry = $pdo->prepare('select * from news');
    $qry->execute();
    $html = '<div class="news_list_header">
        <div class="news_list_name">NEWS LIST</div>
        <div class="news_list_action">ACTION</div>
        </div>
        ';
    foreach($qry->fetchAll() as $row){
        $release = $row["release_flg"] ? 'PUBLIC' : 'PRIVATE'; 
        $html .= '<div class="news_list_column">
            <div class="news_list_date">'. $row["notice_date"] .'</div>
            <div class="news_list_title">'. $row["title"] .'</div>
            <div class="news_list_release">'. $release .'</div>
            <div class="news_list_btn"><a href="news_edit/?id='. $row["id"] .'" class="edit_btn">EDIT</a></div>
            <div class="news_list_btn"><a href="news_delete.php/?id='. $row["id"] .'" onclick="return confirm(\'DELETE CONFIRM\')"
            class="delete_btn">DELETE</a></div>
            </div>';
    }
    echo json_encode($html);
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>