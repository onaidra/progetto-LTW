<?php include('../server.php');
// funzione per inserire elementi nella navbar
function fill_navbar($db)
{
  $username = $_SESSION['username'];
  $output = '';
  $sql = "SELECT DISTINCT lista FROM liste where username='$username' ORDER BY lista";
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $listina = $row['lista'];
    $output .= "<option class='tablink' name='listavalori'>" . $listina . "</option>";
  }
  return $output; 
}
  //funzione per inserire elementi nel container centrale
function fill_container($db)
{
  $username = $_SESSION['username'];
  $output = '';
  $sql = "SELECT nome,URL,prezzo,lista FROM oggetti WHERE username='$username' ";
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $output .= "<div class='row' style='border:1px solid black;'>";
    $output .= "<br><h3 style='display:inline;'>nome:</h3> <h3 style='display:inline;'>" . $row['nome'] . "</h3><br>";
    $output .= "<h3 style='display:inline;'>URL:</h3> <a style='display:inline; font-size:15px; color:rgba(73, 85, 248, 0.897);' href=" . $row['URL'] . ">" . $row['URL'] . "</a><br>";
    $output .= "<h3 style='display:inline;'>Prezzo:</h3> <h3 style='display:inline;'>" . $row['prezzo'] . "</h3><br>";
    $output .= "<h3 style='display:inline;'>Lista:</h3> <h3 style='display:inline;'>" . $row['lista'] . "</h3>";
    $output .= "<a style='display:inline;' id='rimuovere' class='stilebottone' style='font-size:15px;' href='delete.php?id=" . $row['URL'] . " '>Rimuovi</a><br>";
    $output .= "<br>";
    $output .= "</div>";
    $output .= "<hr class='my-4'>";
  }
  return $output;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>WishWeb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="Dentro.js"></script>
  <script src="funzione.js"></script>
  <link href="Dentro.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
</head>
<nav class="navbar navbar-inverse navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" name="barra" href="Dentro.php">WishWeb</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="navbar-brand" name="idpersona" id="idpersona"><span name="user" id="user"><?php echo ($_SESSION["username"]); ?></span></li>
          <li><a href="../Main/Home.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<body>
<form action="" method="post">
  <div class="aperturabottone">
    
  <!-- BOTTONE ADD ELEMENT -->
  
  <button type="button" id="bottone1" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
  </div>
    <div class="elementi" id="elementi" style="display:none" name="elementi">

      <br>
          <p>Insert object name</p>
          <input type="text"  placeholder ="object name" name="nome" id="nome"><br>
          <br>
          <p>Insert URL</p>
          <input type="text" placeholder="website URL" name="URL"id="URL"><br>
          <br>
          <p>Insert Price</p>
          <input type="text" placeholder="price" name="prezzo" id="prezzo"><br>
          <br>
          <p>Insert list</p>
          <input type="text" placeholder="List" name="lista" id="lista"><br>
          <br>
          <button type="submit" name="dentro_user" style="background-color:grey">Add</button>
      </form>
    </div>
    <form action="" method="post">

    <div class="tab">
    <br><br><br>
    
    <!-- BOTTONE ADD LIST-->
    
    <button type="button" class="tablink" id="elem" style="color:white">New List</button>
    <div class="collapsable" id="divlista" name="elementi" style="display:none;">
    <br> 
    <p style="color:white">Insert List name</p>
    <input type="text"  placeholder ="list name" name="listname" id="listname"><br>
    <button type="submit" name="new_list" style="color:white" >Add</button>
    </div>
    </form>
    <!-- INSERISCO LE LISTE A SINISTRA -->
    
    <select name="brand" id="brand" style="background-color:rgba(212, 144, 88, 0.445); color:white">    <!--comando per fare il menu a tendina-->
       <option value="" id="<?php echo ($_SESSION["username"]); ?>">Show All Lists</option>  
       <?php echo fill_navbar($db); ?>  
    </select>
    
    <!-- BOTTONE REMOVE LIST-->
    <form action="" method="post">
    <button type="button" class="tablink" id="bottoneremove" style="color:white">Remove a List </button>
    <div class="collapsable" id="slideremove" name="rimuovi elementi" style="display:none;" >
    <br> 
    <p style="color:white">Insert List name</p>
    <input type="text"  placeholder ="list name" name="removename" id="removename"><br>
    <button type="submit" name="remove_list" style="color:white" >Remove</button>
    </div>
    </form>
  </div>
    <!-- INSERISCO I CONTENUTI NEL CONTAINER -->
    
    <div class="container" id="show_product">
      <?php
      echo fill_container($db);
      ?>
    </div>
</body>
</html>