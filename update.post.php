
<?php
include "./connect/connect.php";


$auteur=$_POST['auteur'];
$titel=$_POST['titel'];
$bericht=$_POST['bericht'];
$afbeelding=$_POST['afbeelding'];

$id=$_POST["id"];



$sql = "INSERT INTO post(auteur, titel, bericht, afbeelding) VALUES (:auteur , :titel, :bericht, :afbeelding)";

$sql= "UPDATE post SET auteur = :auteur, titel = :titel, bericht = :bericht, afbeelding= :afbeelding
                 
WHERE id = :id ";

//Uncaught PDOException: SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens in
//betekent dat je te weining in de $stmt array hebt zitten
$stmt=$db-> prepare ($sql);

$stmt->execute([ 'id'=>$id,'auteur'=>$auteur,'titel'=>$titel, 'bericht'=>$bericht,'afbeelding'=>$afbeelding]);

header('location:index.php');
?>


