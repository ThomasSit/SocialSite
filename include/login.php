<?php
include "include/head.php";

// hier checkt ie of user leeg is
if (!empty($_POST['user'])) {
    if ($_POST['user'] == "thomas" && $_POST['pass'] == "sit") {
        $_SESSION['logon'] = true;
        $_SESSION['user'] = 'thomas';
        $_SESSION['role'] = 'user';
    } else {
        echo "Dit is geen geldige login";
    }
}

if ($_SESSION['logon'] == true) {
    echo "<p>Welkom " . $_SESSION['user'] . "</p>";
} else {
    header("location:login_form.php");
}
