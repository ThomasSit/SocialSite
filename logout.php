<?php

session_start();

$_SESSION['logon'] = false;
$_SESSION['user'] = "";
$_SESSION['role']= "";

header("Location: ./index.php");
