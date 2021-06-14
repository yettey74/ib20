<?php
include('inc/conn.php');
$sql = '';
$q = "SELECT id, title FROM products";
$r = mysqli_query($db, $q);

while ( $x = $r->fetch_assoc() ){
    $id = $x['id'];
    //echo 'ID   is: ' . $id . '<br>';
    $title = $x['title'];
    //echo 'Title is: ' . $title . '<br>';
    $temp = strtolower($title);    
    //echo 'lower is: ' . $temp . '<br>';
    $slug = str_replace(' ', '-', $temp);
    //echo 'slug  is: ' . $slug . '<br>';
    $sql .= "UPDATE `products` SET `slug` = '$slug' WHERE `id` = $id;";
}

echo $sql;
//$insertq = "INSERT INTO `products` (`slug`) VALUES('$slug') WHERE `id` = $id";
//mysqli_query($db, $sql);
?>