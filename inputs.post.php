<?php

$auteur = "";

if (!empty($gebruiker)) {

    $auteur = $gebruiker["auteur"];

}

$titel = "";

if (!empty($gebruiker)) {

    $titel = $gebruiker["titel"];

}

$bericht = "";

if (!empty($gebruiker)) {

    $bericht = $gebruiker["bericht"];

}

$afbeelding = "";

if (!empty($gebruiker)) {

    $afbeelding = $gebruiker["afbeelding"];

}



?>

<div class="form-group">
    <label for="Titel"> auteur</label>
    <input class="form-control" type="text" id="auteur" name="auteur"
           value="<?php echo $auteur;?>"required>
</div>

<div class="form-group">
    <label for="Titel"> titel </label>
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

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="toevoegen" >
</div>