<?php
include('conn.php');
session_start();
//tabella qualita
foreach($_SESSION['qualita'] as $qualita){
    $sport=$qualita['sport'];
    $caratteristica=$qualita['caratteristica'];
    $animale = isset($qualita['animale']) ? $qualita['animale']:'non_specificato';
    $bere= isset($qualita['bere']) ? $qualita['bere']:'non_specificato';
    $fumo= isset($qualita['fumo']) ? $qualita['fumo']:'non_specificato';
    $segnoZ=$qualita['segno'];
    $descrizione=$qualita['descrizione'];
}
//tabella hobby
foreach($_SESSION['hobby'] as $hobbyItems){
    $hobby=isset($hobbyItems['hobby']) ? $hobbyItems['hobby']:'non_specificato';
    $sentire=isset($hobbyItems['sentire']) ? $hobbyItems['sentire']:'non_specificato';
    $esprimi=isset($hobbyItems['esprimi']) ? $hobbyItems['esprimi']:'non_specificato';

}

//tabella interessi
if(isset($_POST['genere']) && isset($_POST['cerchi'])&& isset($_POST['colCapelli']) && isset($_POST['colOcchi']) && isset($_POST['altezza']) && isset($_POST['stile']) && isset($_POST['ragione'])){
 $_SESSION['interessi'][]=["genere"=> $_POST['genere'], "carattCercata"=> $_POST['cerchi'],"colCapelli"=> $_POST['colCapelli'], "colOcchi"=> $_POST['colOcchi'], "altezza"=> $_POST['altezza'], "stile"=> $_POST['stile'],"relazione"=> $_POST['ragione']];

}
foreach($_SESSION['interessi'] as $interessi){
    $genere=$interessi['genere'];
    $carattCercata=$interessi['carattCercata'];
    $colCapelli=$interessi['colCapelli'];
    $colOcchi=$interessi['colOcchi'];
    $altezza=$interessi['altezza'];
    $stile=$interessi['stile'];
    $relazione=$interessi['relazione'];
}

//tabella utente
foreach($_SESSION['utente'] as $utente){
    $nome=$utente['nome'];
    $cognome=$utente['cognome'];
    $eta=$utente['eta'];
    $telefono=$utente['telefono'];
    $email=$utente['email'];
    $pass=$utente['password'];
    $sesso=$utente['sesso'];
}
$queryUtente="INSERT INTO utenti(cognome,nome,email,eta,password,num_telefono,sesso) VALUES ('$cognome','$nome','$email','$eta','$pass','$telefono','$sesso')";
$risuUtente=mysqli_query($conn,$queryUtente)or die("Query fallita ".mysqli_error($conn));
//si ottiene l'id dell'utente appena inserito
$idUtente=mysqli_insert_id($conn);



$queryQualita="INSERT INTO qualita(id_utenti,sport,carattere,animali,bevi,fumo,zodiaco,descrizionePersona)
VALUES('$idUtente','$sport','$caratteristica','$animale','$bere','$fumo','$segnoZ','$descrizione')";
$risuQualita=mysqli_query($conn,$queryQualita) or die ("Query fallita " . mysqli_error($conn));

$queryHobby="INSERT INTO hobby(id_utenti,sentire,esprimiAm,hobby)VALUES('$idUtente','$sentire','$esprimi','$hobby')";
$risuHobby=mysqli_query($conn,$queryHobby)or die("Query fallita ".mysqli_error($conn));

$queryInteressi="INSERT INTO interessi(id_utenti,genere,relazione,caratterePartner,capelli,occhi,altezza,stile)
VALUES('$idUtente','$genere','$relazione','$carattCercata','$colCapelli','$colOcchi','$altezza','$stile')";
$risuInteressi=mysqli_query($conn,$queryInteressi)or die("Query fallita ".mysqli_error($conn));

if(($risuQualita==TRUE) && ($risuHobby==TRUE) && ($risuInteressi==TRUE) && ($risuUtente==TRUE)){

    header("refresh:0;url=estetica.php");
}
?>