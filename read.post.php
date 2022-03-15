<?php

$id = empty($_GET["id"]) ? null : $_GET["id"];


include "./connect/connect.php";

$sql = "SELECT * FROM post   WHERE id=:id";

$params = array(

    ":id" => $id
);

try {

    $sth = $db->prepare($sql);

    $sth->execute($params);

    $gebruiker = $sth->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    echo $e->getMessage();

}
/*de gegevens van de student worden opgeslagen in de variabele $student. Deze variabele wordt een array waarin
 de gegevens van de student beschikbaar zijn. De waarde van bijvoorbeeld de kolom voornaam kan je vinden met:
*/

