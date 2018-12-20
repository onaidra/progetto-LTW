<?php
session_start();
// INIZIALIZZO VARIABILI
$nome = "";
$URL = "";
$prezzo = "";
$username = "";
$email = "";
$errors = array(); 

// CONNETTO AL DATABASE
$db = mysqli_connect('localhost', 'root', '', 'registration');

//FUNZIONE PER RICOLLEGARSI AL SITO UNA VOLTA UNSUBSCRIBED
function GoToNow ($url){
  echo '<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="color:black;">"USER REMOVED SUCCESSFULLY"</p>
  </div>
</div>
<script>
  // PRENDE IL MODAL
  var modal = document.getElementById("myModal");

  // PRENDE ELEMENTO SPAN PER CHIUDERE IL PULSANTE X
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    document.location.href="'.$url.'";
  }

  // SE UTENTE PREME SU QUALSIASI PUNTO CHE NON SIA X CHIUDI UGUALMENTE
  window.onclick = function(event) {
    if (event.target == modal) {
      document.location.href="'.$url.'";
    }
}
</script>';
}
//FUNZIONE PER MOSTRARE GLI ERRORI DAL DATABASE

function phpAlert($msg) {
  echo '<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="color:black;">"'.$msg.'"</p>
  </div>
</div>
<script>
  // PRENDE IL MODAL
  var modal = document.getElementById("myModal");

  // PRENDE ELEMENTO SPAN PER CHIUDERE IL PULSANTE X
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  }

  // SE UTENTE PREME SU QUALSIASI PUNTO CHE NON SIA X CHIUDI UGUALMENTE
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
}
</script>';
}

// pagina di registrazione
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
  //CONTROLLO CHE NON ESISTE UNO STESSO USERNAME 
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // SE ESISTE L'USER
    if ($user['username'] === $username) {
      phpAlert('USERNAME ALREADY EXISTS!');
      array_push($errors, "The two passwords do not match");
    }

    if ($user['email'] === $email) {
      phpAlert('EMAIL ALREADY USED!');
      array_push($errors, "The two passwords do not match");
    }
  }

  //SE TUTTO E' ANDATO A BUON FINE, REGISTRO L'UTENTE
  if (count($errors) == 0) {
    $password = md5($password_1);//CRIPTA LA PASSWORD

    $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location: ../Dentro/Dentro.php');
  }
}
// LOGIN USER
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
      phpAlert('WRONG USERNAME/PASSWORD COMBINATION!');
      array_push($errors,"Wrong username/password combination");
    }
}
//AGGIUNGI ELEMENTO
if(count($errors) == 0) {
if (isset($_POST['dentro_user'])) {
  $username = $_SESSION[('username')];
  $nome = mysqli_real_escape_string($db, $_POST['nome']);
  $URL = mysqli_real_escape_string($db, $_POST['URL']);
  $prezzo = mysqli_real_escape_string($db, $_POST['prezzo']);
  $lista = mysqli_real_escape_string($db, $_POST['lista']);
  $checkquery="SELECT lista FROM liste WHERE lista='$lista' AND username='$username'";
  $result = mysqli_query($db, $checkquery);
  $list = mysqli_fetch_assoc($result);
  if(!$list){
    phpAlert('LISTA NON ESISTENTE,INSERIRE UNA LISTA ESISTENTE O CREARNE UNA NUOVA');
  }
  else {
    $query = "INSERT INTO oggetti (nome,URL,prezzo,username,lista) VALUES('$nome', '$URL', '$prezzo','$username','$lista')";
    mysqli_query($db, $query); 
    header('location: ../Dentro/Dentro.php');

  }
}
}
//AGGIUNGI UNA NUOVA LISTA
if(isset($_POST['new_list'])) {
  $username = $_SESSION[('username')];
  $lista = mysqli_real_escape_string($db, $_POST['listname']);
  $query="INSERT IGNORE INTO liste(username,lista) VALUES ('$username','$lista')";
  mysqli_query($db, $query);
  header('location: ../Dentro/Dentro.php');
}
//RIMUOVI UNA LISTA ESISTENTE 
if(isset($_POST['remove_list'])){
  $username = $_SESSION[('username')];
  $lista= mysqli_real_escape_string($db, $_POST['removename']);
  $query="DELETE  FROM liste WHERE lista='$lista' AND username='$username'";
  mysqli_query($db, $query);
  $query2="DELETE FROM oggetti  WHERE lista='$lista' AND username='$username'";
  mysqli_query($db, $query2);
  header('location: ../Dentro/Dentro.php');
}

// RIMUOVI USER
if(isset($_POST['remove_user'])){
  $username= $_SESSION[('username')];
  $query= "DELETE FROM users WHERE username='$username'";
  mysqli_query($db,$query);
  $query= "DELETE FROM liste WHERE username='$username'";
  mysqli_query($db,$query);
  $query= "DELETE FROM oggetti WHERE username='$username'";
  mysqli_query($db,$query);
  GoToNow('../Main/Home.html');

  
}
?>