<?php include "./include/head.php";?>

<body>
<?php include "read.post.php";?>


<div class="container">

    <form action="update.post.php " method="POST">



        <input type="hidden" name="id" value="<?php echo $gebruiker["id"];?>">
        <?php include "inputs.post.php"; ?>


    </form>

</div>

</body>
<?php include"./include/footer.php";?>