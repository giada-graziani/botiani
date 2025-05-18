<?php
    include("conn.php");
    session_start();

    $email= $_POST["email"];
    $pws= $_POST["password"];
    $q="SELECT 
                *
        FROM
            utenti u
        WHERE 
            u.email = '$email' AND u.password= '$pws'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

    // Verifica se sono stati trovati risultati
    if (mysqli_num_rows($ris) > 0) {
        $q="SELECT 
            *
        FROM
            utenti
        WHERE email='$email'";
        $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
        //echo "2";
        while($row= mysqli_fetch_assoc($ris)){
            $idU=$row['id_utenti'];
        }
        //echo "3";
        $_SESSION['idU']=$idU;
        header("Location: match.php");
    } else {
        header("Location: index.php");
    }
?>