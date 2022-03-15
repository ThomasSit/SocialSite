<?php


// hier bij de knop van navbar gaat naar logout logt uit en gaat gelijk direct naar index.php van index.php gaat ie weer naar de login.php
// bij de code staat als het leeg is gaat ie naar de login_form.php en daar moet je de inloggevens invulllen en dan kom je weer bij de de index..php


session_start();

$_SESSION['logon'] = false;
$_SESSION['user'] = "";
$_SESSION['role']= "";

header("Location: ./index.php");
