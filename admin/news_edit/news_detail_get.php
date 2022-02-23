<?php
try {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=provision-db.c4w1biv461es.eu-west-2.rds.amazonaws.com; dbname=provision; charset=utf8', 'admin', 'Provision1234#');
    $qry = $pdo->prepare('select * from news WHERE id = '. $id);
    $qry->execute();
    $html_array = [];
    foreach($qry->fetchAll() as $row){
        $html_array['title'] = '<input class="news_form_text" type="text" name="title" value="'. $row["title"] .'">';
        $html_array['content'] = '<textarea class="news_textarea" name="content" rows="15">'. $row["content"] .'</textarea>';
        $html_array['release'] = $row["release_flg"] ? 
        '<option value="public" selected>Public</option><option value="private">Private</option>':
        '<option value="public">Public</option><option value="private" selected>Private</option>' ;
    }
    echo json_encode($html_array);
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>

