<?php include "./include/header.php";?>


<?php include "./include/navbar.php";?>

<form action="create-post.php" method="POST" enctype="multipart/form-data">


    <?php



    $auteur = "";

    if (!empty($student)) {

        $auteur = $student["auteur"];

    }

    $titel = "";

    if (!empty($student)) {

        $titel  = $student["titel"];

    }

    $bericht = "";

    if (!empty($student)) {

        $bericht = $student["bericht"];

    }

    $afbeelding = "";

    if (!empty($student)) {

        $afbeelding = $student["afbeelding"];

    }



    ?>

    <div class="container">

    <div class="form-group">
        <label for="Titel"> auteur</label>
        <input class="form-control" type="text" id="auteur" name="auteur"
               value="<?php echo $auteur;?>"required>
    </div>

    <div class="form-group">
        <label for="Titel"> bericht </label>
        <input class="form-control" type="text" id="titel" name="titel"
               value="<?php echo $titel;?>"required>
    </div>

    <div class="form-group">
        <label for="Titel"> bericht </label>
        <input class="form-control" type="text" id="bericht" name="bericht"
               value="<?php echo $bericht;?>"required>
    </div>

    <div class="form-group">
        <label for="Titel"> afbeelding </label>
        <input class="form-control" type="file" id="afbeelding" name="afbeelding"
               value="<?php echo $afbeelding;?>"required>
    </div>

  <input type="submit" value="submit">
        <div>

</form>







