<?php
include "connect/connect.php";
$id=$_GET['id'];
$likes=$_GET['likes'];

$sql = "UPDATE post SET likes = likes-1 WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id]);





?>