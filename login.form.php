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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

</head>
<style>

    body{
      background:url('img/sean-pollock-PhYq704ffdA-unsplash.jpg');
        background-size:cover;

    }
     .icon ion-icon{
     width:200px;
     height:200px;
     margin-left:80px;
     margin-top:-110px;
     color:blue;
     }
     .border{
        border:1px solid;
        width:470px;
        height:440px;
        margin-top:50px;
        margin-left:420px;
        background-color:darkslategray;
        box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
        --border-size: 3px;
  --border-angle: 0turn;

  background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, #f03);
  background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
  background-position: center center;
  background-repeat: no-repeat;
  -webkit-animation: bg-spin 3s linear infinite;
          animation: bg-spin 3s linear infinite;
}
@-webkit-keyframes bg-spin {
  to {
    --border-angle: 1turn;
  }
}
@keyframes bg-spin {
  to {
    --border-angle: 1turn;
  }
}
.box:hover {
  -webkit-animation-play-state: paused;
          animation-play-state: paused;
}

@property --border-angle {
  syntax: "<angle>";
  inherits: true;
  initial-value: 0turn;
}
     
   


.button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}

a{
    text-align:center;
    text-decoration:none;
}
     
    
</style>
<body>
    <div class="border">
     <div class="container mt-5 col-md-10">  
        <div class="icon">
            <ion-icon name="person"></ion-icon>
        </div>                    
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
                       <button  class="button-85"name="submit">Login</button>
                        <a href="index.php" class="button-85">Back</a>                
                </div>
            </div>

        </form>
       
     </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>