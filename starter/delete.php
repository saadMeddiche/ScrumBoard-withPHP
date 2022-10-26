<?php
require "connect.php";
$id = $_GET['id'];
$requete = "DELETE FROM dataofthetasks where id='$id'";
$query = mysqli_query($connection, $requete);

if (isset($query)) {
    header("location:index.php");
} else {
    echo "Error";
}
