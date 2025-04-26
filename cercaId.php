<?php
    include("conn.php");
    session_start();
    $email=$_POST['email'];
    $q="SELECT 
            *
        FROM
            utenti
        WHERE email='$email'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

    while($row= mysqli_fetch_assoc($ris)){
        $idU=$row['id_utenti'];
    }
    $_SESSION['idU']=$idU;
     
?>