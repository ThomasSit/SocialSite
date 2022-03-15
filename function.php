<?php


// Functie om een string te zoeken in een bestand.
// Geeft true terug als de string is gevonden.
// Geeft false terug als niet gevonden of bij fout
function searchInFile($file, $string)
{
    // Lees de inhoud van het bestand in een string variabele
    $string_from_file = file_get_contents($file);

    // Als string false is dan is er een fout opgetreden tijdens het lezen
    if (!$string_from_file) {
        echo 'Kan bestand niet lezen';
        return false;
    }

    // Controleer of $string in $string_from_file zit. Zo niet dan return false
    if (stripos($string_from_file, $string) === false) {
        return false;
    }

    // String is gevonden
    return true;
}


// dit wordt ge echo als er een error is tijdens het uploaden van een image
function processImageUpload($title, $upload_data)
{
    $file_upload_errors = array(
        1 => 'De afbeelding is groter dan de upload_max_filesize instelling in php.ini',
        2 => 'De afbeelding is groter dan de MAX_FILE_SIZE optie in het HTML form',
        3 => 'De afbeelding is maar deels geupload',
        4 => 'Geen afbeelding geupload',
        6 => 'Tijdelijke map ontbreekt',
        7 => 'Fout opgetreden tijdens het wegschrijven van de afbeelding',
        8 => 'Een PHP extensie blokkeert het uploaden',
    );

    $allowed_extensions = array(
        'jpg', 'gif', 'png', 'jpeg'
    );

    // Als titel leeg is return de array succes = false en dan met de message geen titel opgegeven

    if (empty($title)) {
        return array(
            'succes' => false,
            'message' => 'Geen titel opgegeven'
        );
    }

    // is_dir geeft aan of het bestandnaam een map is of niet
    // if is_dir false dan gaat ie door naar mkdir (is make directory) en maakt ie een directory aan als dat ook false is dan
    // return array {De upload map "' . IMAGE_FOLDER . '" bestaat niet en kan ook niet worden aangemaakt}
    if (!is_dir(IMAGE_FOLDER) && !mkdir(IMAGE_FOLDER)) {
        return array(
            'succes' => false,
            'message' => 'De upload map "' . IMAGE_FOLDER . '" bestaat niet en kan ook niet worden aangemaakt'
        );
    }
//Als het 0 is doet het niks als het een van de 8 errors heeft boven in de code bij function geeft het een message aan wat de fout is Tijdens $upload_data
    if ($upload_data['error'] != 0) {
        return array(
            'succes' => false,
            'message' => $file_upload_errors[$upload_data['error']]
        );
    }
// Als de $upload_data te groter is dan MAX_IMAGE_SIZE (MAX_IMAGE_SIZE zit in index.php bovena aan)
//is echo ie Het afbeeldingbestand is te groot en en anders doet ie niks
    if ($upload_data['size'] > MAX_IMAGE_SIZE) {
        return array(
            'succes' => false,
            'message' => 'Het afbeeldingsbestand is te groot'
        );
    }

    // controlleer of dit echt een plaatje is
    if (!getimagesize($upload_data["tmp_name"])) {
        return array(
            'succes' => false,
            'message' => 'Het bestand is geen afbeelding'
        );
    }
// file name wordt opgesplits in stukjes
    $image_filename_parts = explode('.', $upload_data['name']);

    // array_pop Pop het element van het einde van array dus je hebt 4 apen en de laaste aap word wegehaald
    $image_extension = array_pop($image_filename_parts);
    //  strolower Maak een tekenreeks in kleine letter (Retourneert stringmet alle alfabetische
    // tekens geconverteerd naar kleine letters.)
    $image_extension = strtolower($image_extension);


    // als het goed gaat tijdesn de image _extension en aalowed_extensions dan gaat gie door naar de Original_filename zo niet
    // echo ie Ongeldige type , toegestaa: jpg of gif
    if (!in_array($image_extension, $allowed_extensions)) {
        return array(
            'succes' => false,
            'message' => 'Ongeldige type, toegestaan: jpg of gif'
        );
    }

    $original_filename = basename($upload_data['name']);

    // Als hier 2 dezelfde image worden geupload dan maakt ie een random nummer aan bij een van de 2 image zodat ie niet overlapt met de andere image
    do {
        $safe_filename = bin2hex(random_bytes(3)) . '.' . $image_extension;
    } while (file_exists($safe_filename));

    // verplaats de Image uiteindelijke directory
    if (!move_uploaded_file($upload_data['tmp_name'], IMAGE_FOLDER . $safe_filename)) {
        $result = array(
            'succes' => false,
            'message' => 'Er is een onbekende fout opgetreden'
        );
    }
// hier laat ie de titel file_name and orginal_filename zien
    return array(
        'succes' => true,
        'message' => 'OK',
        'title' => $title,
        'filename' => $safe_filename,
        'original_filename' => $original_filename
    );
}


function imageList()
{
    $list = [];

    $handle = opendir(IMAGE_FOLDER);

    do {
        $file = readdir($handle);

        if ($file != false && $file != '.' && $file != '..') {
            $list[] = array(
                'title' => $file,
                'filename' => $file
            );
        }
    } while ($file);

    closedir($handle);

    return $list;
}


