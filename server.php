<?php
session_start();
// inizializzo variabili
$nome = "";
$URL = "";
$prezzo = "";
$username = "";
$email = "";
$errors = array(); 

// connetto al database
$db = mysqli_connect('localhost', 'root', '', 'registration');


// pagina di registrazione
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location: ../Dentro/Dentro.php');
  }
}
// LOGIN USER
if (count($errors) == 0) {
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header('location: ../Dentro/Dentro.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//UNA VOLTA ENTRATI
if (isset($_POST['dentro_user'])) {
  $username = $_SESSION[('username')];
  $nome = mysqli_real_escape_string($db, $_POST['nome']);
  $URL = mysqli_real_escape_string($db, $_POST['URL']);
  $prezzo = mysqli_real_escape_string($db, $_POST['prezzo']); 
  $query = "INSERT INTO oggetti (nome,URL,prezzo,username) VALUES('$nome', '$URL', '$prezzo','$username')";
  mysqli_query($db, $query);
  header('location: ../Dentro/Dentro.php');
}
?>