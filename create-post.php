<?php
include "./connect/connect.php";

$sqlCreatePostTable = ("CREATE TABLE IF NOT EXISTS post (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    auteur VARCHAR(30) NOT NULL,
    titel VARCHAR(30) NOT NULL,
    bericht TEXT NOT NULL,
    afbeelding VARCHAR(30) NOT NULL
    )");

if ($conn->query($sqlCreatePostTable) === TRUE) {
    echo "";
} else {
    echo "Error creating table: ";
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Geen post request";
    // header('location:create-post-form.php');
    exit();
} else {


    include "./connect/connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $auteur = $_POST['auteur'] ?? '';
        $titel = $_POST['titel'] ?? '';
        $bericht = $_POST['bericht'] ?? '';
        $afbeelding = '';

        if (empty($auteur)) {
            echo "Auteur is leeg";
            exit();
        } else if (empty($titel)) {
            echo "Titel is leeg";
            exit();
        } else if (empty($bericht)) {
            echo "Bericht is leeg";
            exit();
        }

        if (isset($_FILES['afbeelding'])) {
            $name_file = $_FILES['afbeelding']['name'];
            $tmp_name = $_FILES['afbeelding']['tmp_name'];
            $local_image = "uploaded/";
            $upload = move_uploaded_file($tmp_name, $local_image . $name_file);

            if ($upload) {
                echo "Uploaded file: " . $name_file;
                $afbeelding = $name_file;
            } else {
                echo 'Error, kon de file niet uploaden: ' . $name_file;
                exit();
            }
        } else {
            echo 'Geen file geselecteerd';
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO post (auteur, titel, bericht, afbeelding) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $auteur, $titel, $bericht, $afbeelding);

        if ($stmt->execute()) {
            header('location:index.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
