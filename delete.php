<?php
$id = $_GET['id'];
//CONNETTO AL  DB

$conn = mysqli_connect('localhost', 'root', '', 'registration');

// CONTROLLO SU CONNESSIONE

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL PER ELIMINARE GLI ELEMENTI   

$sql = "DELETE FROM oggetti WHERE URL = '$id'"; 

//CIUDO CONNESSIONE SE TERMINATA CON SUCCESSO ALTRIMENTI MOSTRO MESSAGGIO

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: ../Dentro/Dentro.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>