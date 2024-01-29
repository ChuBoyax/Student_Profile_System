<?php 
session_start();
require 'otherf/connection-db.php';

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
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
     .name{
    position: absolute;
    left:78%;
    color:white;
    font-size:18px;
   }
</style>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <h5 class="name"><?php   echo $_SESSION['firstname'];  ?> <?php   echo $_SESSION['middle'];  ?> <?php   echo $_SESSION['lastname'];  ?> </h5>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php">Home</a>
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
  <div class="container mt-5 col-md-9">
    <?php
     $student_id = $_GET['id'];
     $qry = "SELECT * FROM profiles WHERE id= $student_id";
     //execute the qry
     $query_run = mysqli_query($con,$qry);
      
      if (mysqli_num_rows($query_run) > 0) 
      {
        $student = mysqli_fetch_array($query_run);
        ?>
    <form action="edit2.php" method="POST" class="row g-3"enctype="multipart/form-data">
     
            <input type="hidden"name="id" class="form-control"value="<?php echo $student['id'];?>">
 
        <div class="col-md-4">
            <label for="" class="form-label">First name</label>
            <input type="text"name="firstname" class="form-control"value="<?php echo $student['first_name'];?>" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Middle name</label>
            <input type="text"name="middlename" class="form-control"value="<?php echo $student['middle_name'];?>" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Last name</label>
            <input type="text"name="lastname" class="form-control" value="<?php echo $student['last_name'];?>" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Address</label>
            <div class="input-group">
            <input type="text"name="address" class="form-control"value="<?php echo $student['address'];?>" aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Email</label>
            <input type="text"name="email" class="form-control"value="<?php echo $student['email'];?>" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Role</label>
            <select class="form-select" name="role" required>
                <option value="0" <?php echo ($student['role'] == '0') ? 'selected' : ''; ?>>Admin</option>
                <option value="1" <?php echo ($student['role'] == '1') ? 'selected' : ''; ?>>User</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Password</label>
            <input type="password"name="password" class="form-control"value="<?php echo $student['password'];?>" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Gender</label>
            <select class="form-select" name="gender" required>
                <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            </select>

        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Civil Status</label>
            <select class="form-select" name="civilstatus" required>
                <option value="Single" <?php echo ($student['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                <option value="Married" <?php echo ($student['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Contact number</label>
            <input type="text"name="contactnumber" class="form-control"value="<?php echo $student['contact_number'];?>"  required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Religion</label>
            <input type="text"name="religion" class="form-control"value="<?php echo $student['religion'];?>"  required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Birthdate</label>
            <input type="date"name="birthdate" class="form-control"value="<?php echo $student['birth_date'];?>"  required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">image</label>
            <input type="file"name="image" class="form-control"value="<?php echo $student['image_path'];?>"  required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"name="submit">Edit</button>
            <a class="btn btn-success" href="users.php?/">Back</a>
        </div>
    </form>
    <?php
        }
        else
        {
          echo "No such ID found";
        }
  
    ?>
 </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<!-- -->