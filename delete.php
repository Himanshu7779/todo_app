<?php
require 'conn.php';
$id = $_GET['id'];
$sql = "DELETE FROM `task` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
     header('location: index.php');

}
?>