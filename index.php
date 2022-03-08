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

include "include/header.php";
include "include/login.php";
include "include/footer.php";

?>

<form action="" method="POST">
    <input type="hidden" name="logout" value="1">
<input type="submit" value="logout";
</form>