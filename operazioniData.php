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
   
    if($ris){ // mysqli_num_rows() è utilizzato per le query di selezione (SELECT), non per le query di inserimento (INSERT)
        echo json_encode(array('esito' => 'successo')); 
    }
    else{
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
            WHERE u.id_utenti<>'$idU' AND u.id_utenti NOT IN (
                                                        SELECT id_utenteMatch
                                                        FROM matchutenti mu
                                                        WHERE mu.id_utenti='$idU')";
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
            WHERE u.sesso='$genere' AND  u.id_utenti<>'$idU' AND u.id_utenti NOT IN (
																	SELECT id_utenteMatch
																	FROM matchutenti mu
																	WHERE mu.id_utenti='$idU')";
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
elseif($nomeFunzione=="controlloProfilo"){
    $email=$_POST["email"];
    $q ="SELECT 
                *
        FROM
            utenti
        WHERE 
            email='$email'";
    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
    if(mysqli_num_rows($ris)>0){
        echo json_encode(array('esito' => 'successo')); 
    }
    else{
         echo json_encode(array('esito' => 'errore')); 
    }
}
elseif($nomeFunzione=="inserimentoFoto"){
    // Verifica se è una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image']) && isset($_POST['idUtente'])) {
    // Specifica la cartella di destinazione
    $targetDir = "images/"; // Assicurati che questa cartella esista e sia scrivibile
    $file = $_FILES['image']['name'];
    $targetFile = $targetDir . basename($file);
    $uploadOk = 1;
    $idU = $_POST['idUtente'];
    $response = array();

    // Controlla se il file è un'immagine
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $response['success'] = false;
        $response['message'] = "Il file non è un'immagine.";
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
        
        // Controlla se il file esiste già
        if (file_exists($targetFile) || $check["mime"] != "image/jpeg") {
            $response['success'] = false;
            $response['message'] = "Spiacente, il file esiste già o non è in formato JPEG.";
            $uploadOk = 0;
        }

        // Controlla la dimensione del file
        if ($_FILES['image']['size'] > 500000) { // Limite di 500KB
            $response['success'] = false;
            $response['message'] = "Spiacente, il file è troppo grande.";
            $uploadOk = 0;
        }

        // Consenti solo determinati formati di file
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $response['success'] = false;
            $response['message'] = "Spiacente, solo file JPG, JPEG, PNG e GIF sono consentiti.";
            $uploadOk = 0;
        }

        // Controlla se $uploadOk è impostato su 0 a causa di un errore
        if ($uploadOk != 0) {
            $q = "INSERT INTO foto (id_utenti, foto) 
                  VALUES ('$idU', '$file')";
            $ris = mysqli_query($conn, $q);
            
            if ($ris) {
                // Se tutto è a posto, prova a caricare il file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $response['success'] = true;
                    $response['message'] = "Il file è stato caricato con successo.";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Spiacente, si è verificato un errore durante il caricamento del tuo file.";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Non è stato possibile inserire i dati nel database. " . mysqli_error($conn);
            }
        }
    }
    
    // Invia la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    // Se non è una richiesta POST valida
    $response = array(
        'success' => false,
        'message' => 'Richiesta non valida'
    );
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
}
?>