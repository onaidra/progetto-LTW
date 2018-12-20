<?php include('../server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style> 
  :-ms-input-placeholder{
      color: #000;
  }
  ::placeholder {
    color: black;
  }
  ::-ms-input-placeholder {
    color: black;
  }
  
  </style>
        <title>WishWeb</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../LogIn/LogIn.css">
        <script text="javascript" src="../LogIn/ModuliLogIn.js"></script>
        <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
        <style>
          body {
              font-family: 'ABeeZee';font-size: 19px;
          }
          </style>

<nav class="navbar navbar-inverse navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="../Main/Home.html">WishWeb</a>
          </div>
          <div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="../About Us/AboutUs.html">About Us</a></li>
              </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../SignIn/SignIn.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            </ul>
            </div>
          </div>
        </div>
      </nav>
<body>
    <!-- LOGIN BOX -->
    <form method="post" action="login.php" name="registr"onSubmit="return validaForm();"> 
    <div class="loginbox">
      <img src="avatar_legno.png" class="avatar">
          <h1>Login Here</h1>
            <p>Username</p>
            <input type="text" name="username" id="nomino" class="form-control " placeholder="Enter Username">
            <p>Password</p> 
            <div id="wrapper">
              <div class="form-group has-feedback">
                  <input type="password" name="password" class="form-control " id="password" placeholder="Enter password">
                  <i class="glyphicon glyphicon-eye-open form-control-feedback" id="eye"></i>
                  <script src="LogIn.js"></script>
              </div>
            </div>
    <!-- CONTAINER PER CAPS LOCK -->

        <div class="kontainer">
          <div id="pesan" class="alert alert-warning mt-2">
            <strong style="color:white">Caps lock On</strong>
            </div>
          </div>
            <input type="submit" name="login_user" value="Login">
            <a href="../SignIn/SignIn.php">Don't have any Account?</a>            
          </form>
    </div>
    <script>
    var caps= document.getElementById('password');
    var pesan=document.getElementById('pesan');
    caps.addEventListener('keyup',function(event){
        if(event.getModifierState('CapsLock')){
            pesan.style.display="block";
        }
        else{
            pesan.style.display="none";
        }
    });
      </script>
</body>
</head>
</html>