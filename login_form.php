<?php include "./include/head.php";


session_start();
?>


    <form action="index.php" method="POST" class="doosform" >
    gebruikersnaam:
        <input type="text" name="user" required>
    Wachtwoord:
         <input type="password" name="pass" required>
        <input type="submit"  value="inloggen">
</form>


<?php include "./include/footer.php"?>