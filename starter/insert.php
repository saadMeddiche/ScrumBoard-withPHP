<?php

//Put the inputs inside the variables
$title = $_POST['title'];
$type = $_POST['flexRadioDefault'];
$priorety = $_POST['priorety'];
$status = $_POST['status'];
$date = $_POST['date'];
$description = $_POST['description'];

// require stop when there is an error
// includ continue even if there is an error
include "connect.php";

$lenghtOfTitle = strlen($title);

if (empty($title) || empty($date) || $lenghtOfTitle <= 3) {

    echo "Please make sure that the textboxes are not empty or their content are less than 3 letters";
} else {
    //Because the php can't read sql so...
    $requete = "INSERT INTO `dataofthetasks`(`title`, `type`, `priorety`, `status`, `date`, `description`)
    VALUES('$title','$type','$priorety','$status','$date','$description')";

    // ... we will use thie function bellow
    $query = mysqli_query($connection, $requete);

    if (isset($query)) {
        //return to index.php
        //Solution for resend the the data
        header("location:index.php");
    } else {
        echo 'erreur';
    }
}
