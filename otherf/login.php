<?php
session_start();
require 'connection-db.php';


if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) && empty($password)){
        header('location: ../login.form.php?/=Email-and-Password-Required');
    }elseif(empty($email)){
        header('location: ../login.form.php?/=email-required');
    }elseif(empty($password)){
        header('location: ../login.form.php?/=password-required');
    }else{
        $sql = "SELECT * FROM profiles WHERE email = '$email' && password = '$password'";
        $query = mysqli_query($con, $sql);

        if(mysqli_num_rows($query) === 1){
            $row = mysqli_fetch_assoc($query);

            if($row['email'] == $email && $row['password'] == $password){
                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['middle'] = $row['middle_name'];
                $_SESSION['lastname'] = $row['last_name'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['civilstatus'] = $row['civil_status'];
                $_SESSION['contactnumber'] = $row['contact_number'];
                $_SESSION['religion'] = $row['religion'];
                $_SESSION['birthdate'] = $row['birth_date'];
                $_SESSION['image'] = $row['image_path'];
                $_SESSION['ID'] = $row['id'];
                header('location: ../dashboard.php');
                exit();
            }
        }else{
            header('location: ../login.form.php?/=Incorrect-Email-or-Password');

        }
    }

}

?>