<?php

$title = $_POST['title2'];
$type = $_POST['flexRadioDefault2'];
$priorety = $_POST['priorety2'];
$status = $_POST['status2'];
$date = $_POST['date2'];
$description = $_POST['description2'];

include "connect.php";

//Length
//https://www.tutorialrepublic.com/faq/how-to-find-string-length-in-php.php#:~:text=You%20can%20simply%20use%20the,if%20the%20string%20is%20empty.
$lenghtOfTitle = strlen($title);

if (empty($title) || empty($date) || $lenghtOfTitle <= 3) {
    echo "Please make sure that the textboxes are not empty or their content are less thn 3 letters";
} else {
    $id = $_POST['id'];
    $requete = "UPDATE `dataofthetasks` 
                SET `title`='$title',`type`='$type',`priorety`='$priorety',`status`='$status',`date`='$date',`description`='$description' WHERE id ='$id'";
    $query = mysqli_query($connection, $requete);

    header("location:index.php");
}
