<?php 
    include('../server.php');
    $output='';
    if(isset($_POST["brand_id"])){
        $username=$_POST["user"];
        if($_POST["brand_id"]!= ''){
            $sql="SELECT nome,URL,prezzo,lista FROM oggetti WHERE lista='".$_POST["brand_id"]."'AND username='$username' ";
            $result=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){
              $output.="<div class='row' style='border:1px solid black;'>";
              $output.="<h1 style='display:inline;'>nome:</h1> <h3 style='display:inline;'>" . $row['nome'] . "</h3><br>";
              $output.="<h1 style='display:inline;'>URL:</h1> <a style='display:inline; font-size:30px;' href=" . $row['URL'] . ">" . $row['URL'] . "</a><br>";
              $output.="<h1 style='display:inline;'>Prezzo:</h1> <h3 style='display:inline;'>" . $row['prezzo'] . "</h3><br>";
              $output.="<a style='display:inline;' id='rimuovere' style='font-size:15px;' href='delete.php?id=" . $row['URL'] . " '>Rimuovi</a><br>";
              $output.="<br>";
              $output.="</div>";
              $output.="<hr class='my-4'>";
        }
        }
        else{
            $sql="SELECT nome,URL,prezzo,lista FROM oggetti WHERE username='$username'";
            $result=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){
            $output.="<div class='row' style='border:1px solid black;'>";
            $output.="<h1 style='display:inline;'>nome:</h1> <h3 style='display:inline;'>" . $row['nome'] . "</h3><br>";
            $output.="<h1 style='display:inline;'>URL:</h1> <a style='display:inline; font-size:30px;' href=" . $row['URL'] . ">" . $row['URL'] . "</a><br>";
            $output.="<h1 style='display:inline;'>Prezzo:</h1> <h3 style='display:inline;'>" . $row['prezzo'] . "</h3><br>";
            $output.="<h1 style='display:inline;'>Lista:</h1> <h3 style='display:inline;'>" . $row['lista'] . "</h3>";
            $output.="<a style='display:inline;' id='rimuovere' style='font-size:15px;' href='delete.php?id=" . $row['URL'] . " '>Rimuovi</a><br>";
            $output.="<br>";
            $output.="</div>";
            $output.="<hr class='my-4'>";
            }
        }

        echo $output;
    }
    ?>