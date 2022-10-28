
<?php
$title = $_POST['title2'];
$type = $_POST['flexRadioDefault2'];
$priorety = $_POST['priorety2'];
$status = $_POST['status2'];
$date = $_POST['date2'];
$description = $_POST['description2'];

require "connect.php";

$id = $_POST['id'];
$requete = "UPDATE `dataofthetasks` 
SET `title`='$title',`type`='$type',`priorety`='$priorety',`status`='$status',`date`='$date',`description`='$description' WHERE id ='$id'";
$query = mysqli_query($connection, $requete);

header("location:index.php");
