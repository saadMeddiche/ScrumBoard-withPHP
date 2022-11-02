<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "scrumboard";
$toDoCounter = 0;

//make a connection to the Data Base
$connection = mysqli_connect($serverName, $userName, $password, $dataBase);

//test de connection
if (!$connection) {
    // 
} else {
    //echo "Connection success";
}
