<?php include "./include/head.php"; ?>

<?php include "./include/navbar.php"; ?>

<!-- <form action="create-post.php" method="POST" enctype="multipart/form-data"> -->
<!-- create-post.php -->


<form action="create-post.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="form-group">
            <label for="Auteur">Auteur</label>
            <input class="form-control" type="text" id="auteur" name="auteur" required>
        </div>

        <div class="form-group">
            <label for="Titel">Titel</label>
            <input class="form-control" type="text" id="titel" name="titel" required>
        </div>

        <div class="form-group">
            <label for="Bericht">Bericht</label>
            <input class="form-control" type="text" id="bericht" name="bericht" required>
        </div>

        <div class="form-group">
            <label for="Afbeelding">Afbeelding</label>
            <input class="form-control" type="file" id="afbeelding" name="afbeelding" required>
        </div>

        <input type="submit" value="submit">
    </div>
</form>

<?php

$auteur = "";
if (!empty($_POST["auteur"])) {

    $auteur = $_POST["auteur"];
}

$titel = "";
if (!empty($_POST["titel"])) {

    $titel  = $_POST["titel"];
}

$bericht = "";
if (!empty($_POST["bericht"])) {

    $bericht = $_POST["bericht"];
}

$afbeelding = "";
if (!empty($_POST["afbeelding"])) {

    $afbeelding = $_POST["afbeelding"];
}

?>