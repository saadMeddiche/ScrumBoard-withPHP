<?php
require "connect.php";
$id = $_GET['id'];
$requete = "DELETE FROM dataofthetasks where id='$id'";
$query = mysqli_query($connection, $requete);

header("location:index.php"); 
// if (isset($query)) {
//     header("location:index.php");
// } else {
//     echo "Error";
// }
