<?php

$servername = 'dfoiwidm';
$username = 'dfoiwidm_student_profiles';
$password = 'stdprofilesystem';
$dbname = 'dfoiwidm_student_profiles';

$con = new mysqli($servername,$username,$password, $dbname);

if ($con->connect_error){
    die("Connection Failed: " . $con->connect_error);
}




?>