<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
</head>
<body>
    <?php
include('conn.php');
session_start();

//tabella qualita

foreach($_SESSION['qualita'] as $qualita){
    $sport=$qualita['sport'];
    $caratteristica=$qualita['caratteristica'];
    $animale=$qualita['animale'];
    $bere=$qualita['bere'];
    $fumo=$qualita['fumo'];
    $segnoZ=$qualita['segno'];
    $descrizione=$qualita['descrizione'];
}
//tabella hobby
foreach($_SESSION['hobby'] as $hobbyItems){
    $hobby=$hobbyItems['hobby'];
    $telefono=$hobbyItems['telefono'];
    $esprimi=$hobbyItems['esprimi'];

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
//tabella caratteristiche aggiuntive

$queryQualita="INSERT INTO qualita(sport,carattere,animali,bevi,fumo,zodiaco,descrizionePersona)
VALUES('$sport','$caratteristica','$animale','$bere','$fumo','$segnoZ','$descrizione')";
$risuQualita=mysqli_query($conn,$queryQualita) or die ("Query fallita " . mysqli_error($conn));

$queryHobby="INSERT INTO hobby(sentire,esprimiAm,hobby)VALUES('$telefono','$esprimere','$hobby')";
$risuHobby=mysqli_query($conn,$queryHobby)or die("Query fallita ".mysqli_error($conn));

$queryInteressi="INSERT INTO interessi(genere,relazione,caratterePartner,capelli,occhi,altezza,stile)
VALUES('$genere','$relazione','$carattCercata','$colCapelli','$colOcchi','$altezza','$stile')";
$risuInteressi=mysqli_query($conn,$queryInteressi)or die("Query fallita ".mysqli_error($conn));

if(($risuQualita->num_rows>0) && ($risuHobby->num_rows>0)&&($risuInteressi->num_rows>0)){
    header("refresh:5;url=match.php");
}
?>

</body>
</html>