<?php
global $conn;
function connect(){
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "bansach";

// Create connection
    if(!$conn) {
        $conn =  mysqli_connect($servername, $username, $password, $databaseName);
        mysqli_set_charset($conn,'utf8');
    }
}
function disConnect(){
    global $conn;
    if($conn){
        mysqli_close($conn);
    }
}
 ?>