<?php
include "./connect/connect.php";


if (isset($_FILES['afbeelding'])){
    $name_file = $_FILES['afbeelding']['name'];
    $tmp_name = $_FILES['afbeelding']['tmp_name'];
    $local_image = "uploaded/";
    $upload = move_uploaded_file($tmp_name, $local_image . $name_file);

    if($upload) {
        echo "uploaded this file" . $name_file;
    }else{
        echo 'error, kon de file niet uploaden' . $name_file;
    }
}

$auteur=$_POST['auteur'];
$titel=$_POST['titel'];
$bericht=$_POST['bericht'];



$sql = "INSERT INTO post(auteur, titel, bericht, afbeelding) VALUES (:auteur , :titel, :bericht, :afbeelding)";
$stmt=$db-> prepare ($sql);
$stmt->execute (['auteur'=>$auteur,'titel'=>$titel, 'bericht'=>$bericht,'afbeelding'=>$name_file]);
header('location:index.php');
?>

