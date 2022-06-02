<?php
include "connect/connect.php";

//geef de id aan bij de knop submit/delete
$id=$_GET['id'];

$p=array(":id"=>$id);



$sql= "DELETE FROM post WHERE id = :id ";

$sth=$db->prepare($sql);

$sth -> execute($p);

$row = $sth->fetch();


// voor file weghalen
unlink("C:\xampp\htdocs\phpstorm\PhpstormProjects\SocialSite\uploaded" . $row['afbeelding']);

$sql = "DELETE FROM post WHERE id=:id";

$sth = $db-> prepare($sql);

$sth->execute(['id' => $id]);

header ("location:index.php");

