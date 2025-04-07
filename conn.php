<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "incontri";
    // connessione al DB
    $conn = mysqli_connect($host, $user, $pass, $db)

    or die("Connessione non riuscita " . mysqli_connect_error() );
?>