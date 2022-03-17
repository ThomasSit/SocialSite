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
</script>





<table class="table">

    <thead>

    <tr>

        <th>Id</th>

        <th>auteur</th>

        <th>Achternaam</th>

        <th>titel</th>

        <th>bericht</th>

        <th>afbeelding</th>

        <th> Verwijder</th>
    </tr>

    </thead>



    <tbody>

    <?php while($row = $sth->fetch()) { ?>
<!-- soort van foreach loop  --!>
        <tr>

            <td><?php echo $row["id"]; ?></td>

            <td><?php echo $row["auteur"]; ?></td>

            <td><?php echo $row["titel"]; ?></td>

            <td><?php echo $row['bericht'];?> </td>
        <div id="image_size">
            <td ><img src="uploaded/<?php echo $row['afbeelding'];?>"> </td>
        </div>


            <td><a class="btn btn-primary" href="update.post.form.php?id=<?php echo $row["id"]?>"> Wijzig </a>  </td>

            <td> <button onclick="confirmDelete(<?php echo $row["id"];?>)"  class="btn btn-danger">Verwijder</button></td>

        </tr>

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