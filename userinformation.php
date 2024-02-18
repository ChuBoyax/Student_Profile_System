<?php 
session_start();

if(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .image{
       display:flex;
       align-items:center;
       justify-content:right;
       margin-top:-70px;
       margin-left:-10px;
    }
   label{
    font-weight:bold;
    font-size:20px;
   }
    input{
    text-align:center;
   }
     .name{
    position: absolute;
    left:40%;
    color:white;
    font-size:25px;
   }

</style>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <h5 class="name"><?php   echo $_SESSION['firstname'];  ?> <?php   echo $_SESSION['middle'];  ?> <?php   echo $_SESSION['lastname'];  ?> </h5>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white">User Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="btn btn-dark dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 1 ? 'd-lock' : 'd-none') ?> " href="">User Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php">Users</a>
                </div>
            </div>
            <div class="container mt-2 col-md-9">
           
                    <div class="container mt-1 text-center">
                    <?php 
                              $imagePath = $_SESSION['image'];
                               if (!empty($imagePath)) {
                               echo '<img src="' . $imagePath . '" alt="Profile Image" style="width: 240px; height: 230px;border-radius:20px;">';
                                } else {
                                echo 'No Image';
                                 }
                            ?>
                    <form class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label">First name</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['firstname'];?>" aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-md-2">
                            <label  class="form-label">Middle name</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['middle'];?>" aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Last name</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['lastname'];?>" aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Address</label>
                            <div class="input-group">
                            <input class="form-control" type="text" value="<?php echo $_SESSION['address'];?>" aria-label="readonly input example" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['email'];?>" aria-label="readonly input example" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['password'];?>" aria-label="readonly input example" readonly>
                        </div>
                        <div class="col-md-4">
                            <label  class="form-label">Gender</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION['gender'];?>" aria-label="readonly input example" readonly>
                        </div>
                    
                       
                            <div class="col-md-2">
                                <label  class="form-label">Civil Status</label>
                                <input class="form-control" type="text" value="<?php echo $_SESSION['civilstatus'];?>" aria-label="readonly input example" readonly>
                            </div>
                            
                        <div class="col-md-2">
                                <label class="form-label">Contact Number</label>
                                <input class="form-control" type="text" value="<?php echo $_SESSION['contactnumber'];?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Religion</label>
                                <input class="form-control" type="text" value="<?php echo $_SESSION['religion'];?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Birth Date</label>
                                <input class="form-control" type="text" value="<?php echo $_SESSION['birthdate'];?>" aria-label="readonly input example" readonly>
                            </div>
                    
                        <div class="col-12">
                        <a class="btn btn-primary" href="editforinfo.php?id=<?php  echo $_SESSION['ID'];?>">Edit</a>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>