<?php
include "./connect/connect.php";


$auteur=$_POST['auteur'];
$titel=$_POST['titel'];
$bericht=$_POST['bericht'];
$afbeelding=$_POST['abeelding'];


$sql = "INSERT INTO Post(auteur, titel, bericht, afbeelding) VALUES (:auteur , :titel, :bericht, :afbeelding)";
$stmt=$db-> prepare ($sql);
$stmt->execute (['auteur'=>$auteur,'titel'=>$titel, 'bericht'=>$bericht,'afbeelding'=>$afbeelding]);
header('location:index.php');
?>