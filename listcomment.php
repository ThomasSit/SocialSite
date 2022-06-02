<?php
include "./include/head.php";
include "./connect/connect.php";

$id = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if ($id === false) {
    die("Geen ID gegeven...");
}



$sql = "SELECT * FROM post where id=:id";

$sth = $db->prepare($sql);

$sth->execute([':id'=>$id]);

?>



<script>
    /* Wat is die “$”? Het dollarteken “$” is een afkorting voor jQuery. Je mag deze afkorting gebruiken
    in plaats van voluit jquery te schrijven.*/


    function confirmDelete(postId) {

// Zoek met jquery het form met id “modal-confirm” en open het form

        $("#modal-confirm").modal('show');

// btn-delete-confirmed moet je toevoegen aan de table bij modal title form  zodat het kan confirmen om het te laten verwijderenx
        $('#btn-delete-confirmed').on('click', function(){deletepost(postId);});
    }

    function deletepost(postId) {

        $('#modal-confirm').modal('hide');

        $.get('delete.post.php',

            {id: postId}).then(

            function() {

                window.location.href = 'index.php';

                window.location.reload(true);});}

    // de like button
    /*
    function likesPost(postId) {
        console.log(postId);
        $.get("create.likes.php",

            {id: postId}).then(

            function() {
                var likeStr = document.getElementById("likes"+postId).innerHTML;
                likeInt = parseInt(likeStr);
                likeInt++;
                document.getElementById("likes"+postId).innerHTML = '' + likeInt;

            });
    }*/
    function likesPost(postId) {
        console.log(postId);
        fetch('create.likes.php?id=' + postId)
            .then()
            .then(response => {
                console.log("succes");
            })
    }



    function deletelikesPost(postId) {
        console.log(postId);
        fetch('delete.likes.php?id=' + postId)
            .then()
            .then(response => {
                console.log("succes");
            })
    }

    /*
    function deletelikesPost(postId) {
        console.log(postId);
        $.get('delete.likes.php',

            {id: postId}).then(

            function() {

                var likeStr = document.getElementById("likes"+postId).innerHTML;
                likeInt = parseInt(likeStr);
                likeInt--;
                document.getElementById("likes"+postId).innerHTML = '' + likeInt;

            });

    }
*/
</script>










<tbody >
<div class="doos">
<?php while($row = $sth->fetch()) {;?>
    <!-- soort van foreach loop het is eigelijk een while loop -->




        <th><?php echo $row["id"]; ?></th><br>

        <th><?php echo $row["auteur"]; ?></th><br>

        <a href="listcomment.php?id=<?php echo $row["id"]?>"><td>Titel:<?php echo $row["titel"]; ?><br></td></a><th><?php echo $row["titel"]; ?></th><br>

        <th><?php echo $row['bericht'];?> </th><br>

        <td id="image_size">
            <img src="uploaded/<?php echo $row['afbeelding'];?>"><br>
        </td>


     <!--   --><?php /* print_r($row);*/?>


        <td><a class="btn btn-primary" href="update.post.form.php?id=<?php echo $row["id"]?>"> Wijzig </a>  </td>

        <td> <button onclick="confirmDelete(<?php echo $row["id"];?>)"  class="btn btn-danger">Verwijder</button></td><br><br>
        <!---De stukje-->



<td>
    <form action="create-comment.php" method="post">
        <input id="like" type="hidden" name="id" value="<?php echo($row["id"]); ?>">

        <input id="like" type="hidden" name="post_id" value="<?php echo($row["id"]); ?>">


        <textarea class="form-control" type="text" name="comment" rows="3" required></textarea>
        <br>
        <input type="submit" name="" value="comment" class="btn btn-primary">
    </form>
    <h1>Comments:</h1>
    <div>

    <?php

    $sql2 = "SELECT * FROM comment WHERE post_id=:id";
    $sth2 = $db->prepare($sql2);
    //verschil tussen $row en $row2 is $row is voor de post en $row2 was voor de comment table
    $sth2->execute([':id'=>$row["id"]]);
    while($row2 = $sth2->fetch() ) {
         /*print_r($row['comment'])*/?>
        <td><?php echo $row2["comment"]; echo "" ;?></td><br>
    <?php } ?>
<input type="button" value="back" onclick="history.back()">

<?php } ?>

</tbody>

</table>



<div class="modal"  tabindex="-1" role="dialog" id="modal-confirm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button id="btn-delete-confirmed" onclick="confirmDelete()" class="btn btn-primary">verwijder</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>