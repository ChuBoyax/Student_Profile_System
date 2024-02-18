<?php 
session_start();
require 'otherf/connection-db.php';

if(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}
$sql = "SELECT * FROM profiles";
$result = $con->query($sql);
//male
$sql = "SELECT * FROM profiles WHERE gender='male'";
$gendermale = $con->query($sql);

//female
$sql = "SELECT * FROM profiles WHERE gender='female'";
$genderfemale = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>

   span{
    color:white;
   
   }
   .name{
    position: absolute;
    left:40%;
    color:white;
    font-size:25px;
   }
   .student i{
    font-size:40px;
    position: absolute;
    top:28%;
    left:80%;
    color:white;
   }
   #sidebar-wrapper {
        height: 87vh; 
    }



</style>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <h5 class="name"><?php   echo $_SESSION['firstname'];  ?> <?php   echo $_SESSION['middle'];  ?> <?php   echo $_SESSION['lastname'];  ?> </h5>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>">Admin</a>
                            <a class="nav-link text-white <?php echo($role == 1? 'd-lock' : 'd-none') ?>">Dashboard</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                
                                       <?php 
                                            $imagePath = $_SESSION['image'];
                                            if (!empty($imagePath)) {
                                                echo '<img src="' . $imagePath . '" alt="Profile Image" style="max-width: 50px; max-height: 50px;border-radius:50px;">';
                                            } else {
                                                echo 'No Image';
                                            }
                                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="otherf/logout.php">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       
<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white col-2" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="dashboard.php">Dashboard</a>                  
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-lock' : 'd-none') ?> " href="userinformation.php">User Profile</a>               
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php?/">Users</a>
                </div>
            </div>
               
      <div class="container  mt-3 <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>  ">
      <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0 ">
            <div class="card bg-secondary">
            <div class="card-body">
            <?php
            echo "<h2>"."<span>" . $result->num_rows . "</h2>"."</span>";
            ?>
                <h5 class="card-title"><span>Students</span></h5>             
             <div class="student">
             <i class="fa-solid fa-user-graduate"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-secondary">
              <div class="card-body">
              <?php
                 echo "<h2>"."<span>". $gendermale->num_rows . "</h2>"."</span>";
                ?>
                <h5 class="card-title "><span>Male</span></h5>
                <div class="student">
                <i class="fa-solid fa-person"></i>
                </div>
              </div>
          </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-secondary">
              <div class="card-body">
              <?php
                 echo "<h2>"."<span>" . $genderfemale->num_rows . "</h2>"."</span>";
                ?>
                <h5 class="card-title"><span>Female</span></h5>
                <div class="student">
                <i class="fa-solid fa-person-dress"></i>
                </div>
              </div>
          </div>
        </div>
      </div>
   </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>