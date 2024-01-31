<?php 
session_start();
require 'otherf/connection-db.php';

$sql = "SELECT * FROM profiles";
$query = mysqli_query($con, $sql);

if(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}
if (isset($_GET['/'])) {
    $er = $_GET['/'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<style>
     .name{
    position: absolute;
    left:78%;
    color:white;
    font-size:18px;
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
                            <a class="nav-link text-white"<?php echo($role == 0 ? 'd-lock' : 'd-none') ?>>Admin</a>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php?/"><span class="usericon">Users</a>
                </div>
            </div>
            <div class="container-fluid mx-3">
                    <div class="container mt-2">
                    <div class="text-center">
                        <div class="alert alert-info <?php echo($er == "deleted" ? 'd-block' : 'd-none') ?>" role="alert" id="deleteAlert">
                            Deleted Successfully
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="alert alert-info <?php echo($er == "UpdateSuccessfully" ? 'd-block' : 'd-none') ?>" role="alert" id="updateAlert">
                            Updated Successfully
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="alert alert-info <?php echo($er == "StudentAddSuccessfully" ? 'd-block' : 'd-none') ?>" role="alert" id="addAlert">
                            Added Successfully
                        </div>
                    </div>

    <!-- JavaScript code -->
    <script>
        function hideAlert(alertId) {
            var alertElement = document.getElementById(alertId);
            alertElement.classList.add('d-none');
        }

        document.addEventListener('DOMContentLoaded', function () {
            var deleteAlert = document.getElementById('deleteAlert');
            var updateAlert = document.getElementById('updateAlert');
            var addAlert = document.getElementById('addAlert');

            if (deleteAlert.classList.contains('d-block')) {
                setTimeout(function() {
                    hideAlert('deleteAlert');
                }, 3000); // 2000 milliseconds o 2 seconds
            }

            if (updateAlert.classList.contains('d-block')) {
                setTimeout(function() {
                    hideAlert('updateAlert');
                }, 3000);
            }

            if (addAlert.classList.contains('d-block')) {
                setTimeout(function() {
                    hideAlert('addAlert');
                }, 3000);
            }
        });
    </script>
                        
                        <a href="addstudentform.php" class="btn btn-primary">Add Students</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>                               
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($query->num_rows > 0){
                                while($row = $query->fetch_assoc()){
                            ?> 
                                <tr>   
                                    <td><?php echo $row['id'] ?></td>                              
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['first_name'] ?></td>
                                    <td><?php echo $row['middle_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>                                  
                                    <td><?php echo $row['address'] ?></td>                                   
                                    <td>
                                    <?php 
                                            $imagePath = $row['image_path'];
                                            if (!empty($imagePath)) {
                                                echo '<img src="' . $imagePath . '" alt="Profile Image" style="max-width: 60px; max-height: 60px;border-radius:50px;">';
                                            } else {
                                                echo 'No Image';
                                            }
                                        ?>
                                    </td>
                                    <td><span class="badge <?php echo($row['role'] == 0 ? "bg-danger" : "bg-warning") ?>"><?php echo($row['role'] == 0 ? "Admin" : "User") ?></span></td>
                                    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                                    <td><a class="btn btn-danger" href="otherf/user.delete.php?id=<?php echo $row['id'] ?>">Delete</a>    
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

     
     




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>