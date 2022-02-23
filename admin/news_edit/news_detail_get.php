<?php
try {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=mysql3.onamae.ne.jp; dbname=ejvxn_7k38a648; charset=utf8', 'ejvxn_admin', 'admin11-');
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

