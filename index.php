<?php
session_start();
//if (isset($_POST['logout'])) {
//    unset($_SESSION['user']);
//}
//
//if (isset($_SESSION['user'])) {
//    header("location: ./include/login.php");
//    exit();
//}


// bepaalde groote maximaal van de image
CONST MAX_IMAGE_SIZE = 1024 * 1024 * 1024;
// Directery naar de folder uploads CONST staat voor contstant
CONST IMAGE_FOLDER = 'uploads/';

// De image check
include('function.php');

include "include/header.php";
include "include/navbar.php";
include "include/login.php";
include "list.post.php";
include "include/footer.php";




?>

