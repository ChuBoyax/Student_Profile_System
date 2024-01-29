<?php

require 'connection-db.php';
$userID = $_GET['id'];

$sql = "DELETE FROM profiles WHERE id='$userID'";

if($con->query($sql) === TRUE){
    header('location: ../users.php?/=deleted');
}

?>