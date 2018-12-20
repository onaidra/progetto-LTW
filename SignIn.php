<?php include('../server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../SignIn/Sign In.css" rel="stylesheet" type="text/css" />
    <script src="moduliSignIn.js">  </script>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <style>
      body {
          font-family: 'ABeeZee';font-size: 19px;
      }
      </style>
</head>
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
        <li><a href="../LogIn/LogIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        </div>
        </div>
    </div>
</nav>
<body>
        <div class="page-container">
            <form action="" method="post" name="registr" onSubmit="return validaForm();">
            <h1>Sign Up</h1>
            
                <input type="text" name="username" class="Name" placeholder="Username">
                <input type="text" name="email" class="Email" placeholder="Email">
                <div class = "page-container" id="wrapper">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password_1" id="password" placeholder="Password">
                            <i class="glyphicon glyphicon-eye-open form-control-feedback" id="eye"></i>
                            <script src="SignIn.js"></script>
                        </div>
                </div>

                <div id="wrapper">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="password2" name="password_2" placeholder="Confirm password">
                        <i class="glyphicon glyphicon-eye-open form-control-feedback" id="oye"></i>
                        <script src="SignIn2.js"></script>

                    </div>
                </div>
        <!-- CONTAINER PER CAPS LOCK 2 -->
        <div class="kontainer">
          <div id="pesan" class="alert alert-warning mt-2">
            <strong style="color:white">Caps lock On</strong>
          </div>
        </div>
                <button type="submit" value="Add" name="reg_user">Submit</button>
            </form>
        </div>
    </form>
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
        <script>
    var caps= document.getElementById('password2');
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
</html>