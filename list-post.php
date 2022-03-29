<?php

include "./connect/connect.php";

$sql = "SELECT * FROM post";

$sth = $db->prepare($sql);

$sth->execute();

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

     <?php while($row = $sth->fetch()) {;?>
<!-- soort van foreach loop  -->

        <div class="doos">

         <th><?php echo $row["id"]; ?></th><br>

            <th><?php echo $row["auteur"]; ?></th><br>

            <a href="listcomment.php?id=<?php echo $row["id"]?>"><td>Titel:<?php echo $row["titel"]; ?><br></td></a><th><?php echo $row["titel"]; ?></th><br>

            <th><?php echo $row['bericht'];?> </th><br>

            <td id="image_size">
                    <img src="uploaded/<?php echo $row['afbeelding'];?>"><br>
            </td>



            <td><a class="btn btn-primary" href="update.post.form.php?id=<?php echo $row["id"]?>"> Wijzig </a>  </td>

            <td> <button onclick="confirmDelete(<?php echo $row["id"];?>)"  class="btn btn-danger">Verwijder</button></td><br>
   <!---De stukje-->
            <td><button onclick="likesPost(<?php echo $row["id"]?>)" class="like__btn">
                    <span id="icon"><i class="far fa-thumbs-up"></i></span>
                    <span id="count"></span> Like
                </button>
            </td>

            <td>
                <div id="likes<?php echo $row["id"]?>"><?php echo $row["Likes"];?></div>
            </td>
            <td><button onclick="deletelikesPost(<?php echo $row["id"]?>)" class="like__btn">
                    <span id="icon"><i class="far fa-thumbs-down"></i></span>
                    <span id="count"></span> unlike
                </button>

            </td>
        </div>



            <td>
                <form action="create-comment.php" method="post">
                    <input id="like" type="hidden" name="id" value="<?php echo($row["id"]); ?>">
                    <textarea class="form-control" type="text" name="comment" rows="3" required></textarea>
                    <br>
                    <input type="submit" name="" value="comment" class="btn btn-primary">
                </form>
                <h1>Comments:</h1>
                <div>
                    <?php
                    }
                    // hier gaat samen de post en comment table samenvoegen van post table naar comment table
                    $sql2 = "SELECT * FROM post b JOIN comment c ON (c.post_id = b.id) WHERE c.post_id = b.id AND b.id = :id";
                    $sth2 = $db->prepare($sql2);
                    $sth2->execute([':id' => $row["id"]]);
                    while($row = $sth2->fetch()){ ?>

            <td><?php echo $row["comment"]; echo "<br>"?> </td>
            </td>
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