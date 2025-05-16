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
elseif($nomeFunzione=="prendiProfilo"){

    $idU=$_POST["idU"];

    $q ="SELECT 
                *
        FROM
            interessi
        WHERE 
            id_utenti='$idU'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

    while($row=mysqli_fetch_array($ris,MYSQLI_ASSOC)){
        $genere=$row["genere"];
    }
    
    if($genere=="entrambi"){
        $q="SELECT 
                *
            FROM
                foto f
            INNER JOIN utenti u
            ON u.id_utenti=f.id_utenti
            WHERE u.id_utenti<>'$idU'";
    }
    else{
        $q="SELECT 
                *
            FROM
                foto f
            INNER JOIN utenti u
            ON u.id_utenti=f.id_utenti
            INNER JOIN qualita q
            ON q.id_utenti=u.id_utenti
            WHERE u.sesso='$genere' AND  u.id_utenti<>'$idU'";
    }
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

    $risultati=array();

    // Popola l'array con i risultati della query
    while($row= mysqli_fetch_assoc($ris)){
        $risultati[]= $row;
    }
    // Restituisci i risultati come JSON
    header('Content-Type: application/json');
    echo json_encode($risultati);
}
elseif($nomeFunzione=="cercaFoto"){
    $idU=$_POST["idU"];

    $q ="SELECT 
            foto
        FROM
            foto
        WHERE 
            id_utenti='$idU'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

    echo json_encode($ris);
}
elseif($nomeFunzione=="inserisciMatch"){
    $idUM=$_POST["idProfiloMatch"];
    $idU=$_POST["idU"];
    $q ="INSERT INTO 
            matchUtenti(id_utenti,id_utenteMatch) 
        VALUES
            ('$idU', '$idUM')";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
    
    if($ris){ // mysqli_num_rows() è utilizzato per le query di selezione (SELECT), non per le query di inserimento (INSERT)
        echo json_encode(array('esito' => 'successo')); 
    }
    else{
        echo json_encode(array('esito' => 'errore', 'messaggio' =>'match non inserito')); 
    }
    
}
?>