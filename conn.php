<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_list";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn){
    //echo "connection established";
}else{
    die("connection failed");
}
?>