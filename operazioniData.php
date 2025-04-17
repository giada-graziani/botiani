<?php

include('conn.php');
//require_once 'funzioni.php';


$nomeFunzione=$_POST["functionname"];

//SICUREZZA BERTOLI
/*
$stmt = $conn->prepare("INSERT INTO carattAggiuntive (id_utenti, capelli, occhi, altezza, stile) 
                        VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $idU, $capelli, $occhi, $altezza, $stile);

if ($stmt->execute()) {
    echo json_encode(array('esito' => 'successo'));
} else {
    echo json_encode(array('esito' => 'errore', 'messaggio' => 'Caratteristiche non inserite: ' . $stmt->error));
}
*/
//echo "1e";

if($nomeFunzione=="estetica"){
    $occhi= $_POST["occhi"];
    $capelli= $_POST["capelli"];
    $altezza= $_POST["altezza"];
    $stile= $_POST["stile"];
    $idU= $_POST["idU"];
    //echo "2e";
    $q = "INSERT INTO
            carattAggiuntive
            (id_utenti, capelli, occhi, altezza, stile)
        VALUES
            ('$idU', '$capelli', '$occhi', '$altezza', '$stile')";

    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
    //echo "4e";
    if($ris){ // mysqli_num_rows() è utilizzato per le query di selezione (SELECT), non per le query di inserimento (INSERT)
        echo json_encode(array('esito' => 'successo')); 
        //echo "5.0e";
    }
    else{
        //echo "5.1e";
        echo json_encode(array('esito' => 'errore', 'messaggio' =>'caratteristiche non inserite')); 
    }
}
elseif($nomeFunzione=="login"){
    $email= $_POST["email"];
    $pws= $_POST["pws"];
    $q="SELECT 
                *
        FROM
            utenti
        WHERE 
            email = '$email' AND password= '$pws'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
    if(mysqli_num_rows($ris)>0){
        echo json_encode(array('esito' => 'successo')); 
    }
    else{
        echo json_encode(array('esito' =>'errore', 'messaggio' =>'not found')); 
    }
}
elseif($nomeFunzione=="foto"){
    echo "1e";
    $idU=$_POST["idU"];
    $foto= $_POST["foto"];
    echo "2e";
    $q = "INSERT INTO
            foto
            (id_utenti, foto)
        VALUES
            ('$idU', '$foto')";
        echo "3e";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
    if($ris){ 
        echo "4.1e";
        echo json_encode(array('esito' => 'successo')); 
    }
    else{
        echo "4.2e";
        echo json_encode(array('esito' => 'errore', 'messaggio' =>'foto non inserita')); 
    }
}

?>