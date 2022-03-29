<?php
include "./connect/connect.php";
include "include/header.php";

$post_id=$_POST['id'];
$comment=$_POST['comment'];
$id=$_POST['id'];



$sql = "INSERT INTO `comment` (comment, post_id ) VALUES (:comment, :post_id)";
$stmt = $db->prepare($sql);
$params = [':comment' => $comment, ':post_id' => $post_id];
$result = $stmt->execute($params);

header('location:listcomment.php?id='.$id);
?>

