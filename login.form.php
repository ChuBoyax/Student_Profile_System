<?php 
session_start();

if(isset($_SESSION['password']) && isset($_SESSION['email'])){
    header('location: dashboard.php');
}

if(isset($_GET['/'])){
    $error = $_GET['/'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    

</head>
<style>
  body{
    background-color:whitesmoke;
  }
</style>

<body>   

     <div class="container mt-5 col-md-4"> 
     <h2 class="text-center">Login Form</h2>                  
            <div class="alert alert-info <?php echo($error == "Email-and-Password-Required" ? 'd-block' : 'd-none') ?>" role="alert">
                Email and password required
            </div>
            <div class="alert alert-info <?php echo($error == "Incorrect-Email-or-Password" ? 'd-block' : 'd-none') ?>" role="alert">
             Incorrect email or password
            </div>
        <form action="otherf/login.php" method="post" class="row g-3 mt-3">
            <div class="col-12">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <div class="alert alert-info <?php echo($error == "email-required" ? 'd-block' : 'd-none') ?> " role="alert">
                  Email Required
                </div>      
            </div>
            <div class="col-12">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="alert alert-info <?php echo($error == "password-required" ? 'd-block' : 'd-none') ?>" role="alert">
                    Password Required
                </div>            
            </div>
            <div class="container mt-4">
                <div class="d-grid gap-2">                                
                <input type="submit" class="btn btn-success" name="submit" value="Login">
                <a class="btn btn-primary" href="index.php?/">Back</a>           
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>