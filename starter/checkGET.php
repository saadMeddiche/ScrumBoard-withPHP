<?php
require "connect.php";

//Pop up the update modal
if (!empty($_GET['id'])) {
?>
    <script type="text/javascript">
        //Clique the hidden button
        //$('#update').modal('show'); [X]
        $('#updateBTN').click();

        //Go to the index.php page when the clique its outside the modal
        //https://stackoverflow.com/questions/9992368/html-click-anywhere-except-one-element
        // $('html').click(function(e) {
        //     if (!$(e.target).hasClass('modal-content')) {
        //         $(".modal-content").hide() = true;
        //     }
        // });
    </script>
<?php
}

//Move  the task Backward
if (!empty($_GET['moveB'])) {
    require "connect.php";

    $id = $_GET['moveB'];

    $requete = "SELECT dataofthetasks.status FROM dataofthetasks WHERE id='$id' ";

    $query = mysqli_query($connection, $requete);

    $row = mysqli_fetch_assoc($query);

    if ($row['status'] == 2) {

        require "connect.php";

        $requete = "UPDATE `dataofthetasks` 
                SET `status`='1' WHERE id ='$id'";

        $query = mysqli_query($connection, $requete);
    } else if ($row['status'] == 3) {

        require "connect.php";



        $requete = "UPDATE `dataofthetasks` 
                SET `status`='2' WHERE id ='$id'";

        $query = mysqli_query($connection, $requete);
    }
    header("location:index.php");
}

//Move  the task Forward
if (!empty($_GET['moveF'])) {
    require "connect.php";

    $id = $_GET['moveF'];

    $requete = "SELECT dataofthetasks.status FROM dataofthetasks WHERE id='$id' ";

    $query = mysqli_query($connection, $requete);

    $row = mysqli_fetch_assoc($query);

    if ($row['status'] == 1) {

        require "connect.php";

        $requete = "UPDATE `dataofthetasks` 
                SET `status`='2' WHERE id ='$id'";

        $query = mysqli_query($connection, $requete);
    } else if ($row['status'] == 2) {

        require "connect.php";



        $requete = "UPDATE `dataofthetasks` 
                SET `status`='3' WHERE id ='$id'";

        $query = mysqli_query($connection, $requete);
    }
    header("location:index.php");
}




?>