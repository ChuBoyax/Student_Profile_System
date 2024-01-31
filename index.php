<?php
session_start();
if(isset($_SESSION['ID']) && isset($_SESSION['email'])){
    header('location: dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<style>
    body{
        background:url('img/mche-lee-PC91Jm1DlWA-unsplash.jpg');
        background-size:cover;
    
    }
    .dis{
         display:flex;
         align-items:center;
         justify-content:center;
         position: absolute;
         top:40%;
         left:28%;
         border:2px solid;
         padding:15px;
         background-color:rgba(0,0,0,0.3);
         
    }
    h1{
        font-size:60px;
        color:blue;
    }
  
.animation-container {
  display: block;
  position: relative;
  width: 800px;
  max-width: 100%;
  margin: 0 auto;
  
  .lightning-container {
    position: absolute;
    top: 50%;
    left: 0;
    display: flex;
    transform: translateY(-50%);
    
    .lightning {
      position: absolute;
      display: block;
      height: 12px;
      width: 12px;
      border-radius: 12px;
      transform-origin: 6px 6px;

      animation-name: woosh;
      animation-duration: 1.5s;
      animation-iteration-count: infinite;
      animation-timing-function: cubic-bezier(0.445, 0.050, 0.550, 0.950);
      animation-direction: alternate;

      &.white {
        background-color: white;
        box-shadow: 0px 50px 50px 0px transparentize(white, 0.7);
      }

      &.red {
        background-color: #fc7171;
        box-shadow: 0px 50px 50px 0px transparentize(#fc7171, 0.7);
        animation-delay: 0.2s;
      }
    }
  }
  
  
  .boom-container {
    position: absolute;
    display: flex;
    width: 80px;
    height: 80px;
    text-align: center;
    align-items: center;
    transform: translateY(-50%);
    left: 200px;
    top: -145px;
    
    .shape {
      display: inline-block;
      position: relative;
      opacity: 0;
      transform-origin: center center;
      
      &.triangle {
        width: 0;
        height: 0;
        border-style: solid;
        transform-origin: 50% 80%;
        animation-duration: 1s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
        margin-left: -15px;
        border-width: 0 2.5px 5px 2.5px;
        border-color: transparent transparent #42e599 transparent;
        animation-name: boom-triangle;
        
        &.big {
          margin-left: -25px;
          border-width: 0 5px 10px 5px;
          border-color: transparent transparent #fade28 transparent;
          animation-name: boom-triangle-big;
        }
      }
      
      &.disc {
        width: 8px;
        height: 8px;
        border-radius: 100%;
        background-color: #d15ff4;
        animation-name: boom-disc;
        animation-duration: 1s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
      }
      
      &.circle {
        width: 20px;
        height: 20px;
        animation-name: boom-circle;
        animation-duration: 1s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
        border-radius: 100%;
        margin-left: -30px;
        
        &.white {
          border: 1px solid white;
        }
        
        &.big {
          width: 40px;
          height: 40px;
          margin-left: 0px;
          
          &.white {
            border: 2px solid white;
          }
        }
      }
      
      &:after {
        background-color: rgba(178, 215, 232, 0.2);
      }
    }
    
    .shape {
      &.triangle, &.circle, &.circle.big, &.disc {
        animation-delay: .38s;
        animation-duration: 3s;
      }
      
      &.circle {
        animation-delay: 0.6s;
      }
    }
    
    &.second {
      left: 485px;
      top: 155px;
      .shape {
        &.triangle, &.circle, &.circle.big, &.disc {
          animation-delay: 1.9s;
        }
        &.circle {
          animation-delay: 2.15s;
        }
      }
    }
  }
}

@keyframes woosh {
  0% {
    width: 12px;
    transform: translate(0px, 0px) rotate(-35deg);
  }
  15% {
    width: 50px;
  }
  30% {
    width: 12px;
    transform: translate(214px, -150px) rotate(-35deg);
  }
  30.1% {
    transform: translate(214px, -150px) rotate(46deg);
  }
  50% {
    width: 110px;
  }
  70% {
    width: 12px;
    transform: translate(500px, 150px) rotate(46deg);
  }
  70.1% {
    transform: translate(500px, 150px) rotate(-37deg);
  }
  
  85% {
    width: 50px;
  }
  100% {
    width: 12px;
    transform: translate(700px, 0) rotate(-37deg);
  }
}

@keyframes boom-circle {
  0% {
    opacity: 0;
  }
  5% {
    opacity: 1;
  }
  30% {
    opacity: 0;
    transform: scale(3);
  }
  100% {
  }
}

@keyframes boom-triangle-big {
  0% {
    opacity: 0;
  }
  5% {
    opacity: 1;
  }
  
  40% {
    opacity: 0;
    transform: scale(2.5) translate(50px, -50px) rotate(360deg);
  }
  100% {
  }
}

@keyframes boom-triangle {
  0% {
    opacity: 0;
  }
  5% {
    opacity: 1;
  }
  
  30% {
    opacity: 0;
    transform: scale(3) translate(20px, 40px) rotate(360deg);
  }
  
  100% {
  }
}

@keyframes boom-disc {
  0% {
    opacity: 0;
  }
  5% {
    opacity: 1;
  }
  40% {
    opacity: 0;
    transform: scale(2) translate(-70px, -30px);
  }
  100% {
    
  }
}


</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
            
            <div>
                <a href="login.form.php?/" class="btn btn-info">Login</a>
            </div>
        </div>
    </nav>
  <div class="dis">
    <h1>Student Registration</h1>
  </div>

  <div class="animation-container">
  <div class="lightning-container">
    <div class="lightning white"></div>
    <div class="lightning red"></div>
  </div>
  <div class="boom-container">
    <div class="shape circle big white"></div>
    <div class="shape circle white"></div>
    <div class="shape triangle big yellow"></div>
    <div class="shape disc white"></div>
    <div class="shape triangle blue"></div>
  </div>
  <div class="boom-container second">
    <div class="shape circle big white"></div>
    <div class="shape circle white"></div>
    <div class="shape disc white"></div>
    <div class="shape triangle blue"></div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>