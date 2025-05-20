<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">   
     <link rel="stylesheet" href="style2.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    <title>Charme</title>
</head>
<body>
<style>
/* Stili per la navbar */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background-color: rgba(100, 36, 50, 0.9) !important;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.navbar-brand {
    color: white !important;
    font-weight: bold;
    font-size: 1.5rem;
}

.navbar-nav .nav-link {
    color: white !important;
    margin: 0 10px;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #db687b !important;
}
body > .container{
    background-color: rgba(248, 248, 248, 0.747);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    width: 90%;
    margin: 30px 20px 30px 20px;
    max-width: 600px;
    text-align: center;
    animation: scaleIn 0.8s ease-out;
}
body {
    background: linear-gradient(135deg, #642432 0%, #c56975 100%);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding-top: 100px; /* Spazio per la navbar */
    padding-bottom: 20px;
}
h1 {
    font-size: 2.8rem;
    margin-bottom: 10px;
    color: #722c44;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    text-align:center;
}
label{
   color: #6e446b;
   font-weight: bold;
}
a{
    background-color:#db687b;
    color: white;
    border: none;
    padding: 12px 35px;
    font-size: 1.1rem;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(219, 104, 123, 0.5);
    margin: 10px 0;
    text-decoration:none;
    
}
a:hover {
    background-color: #e94e68;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
}
.foto{
    width: 250px; 
    height: 250px;
    overflow: hidden;
    border-radius: 50%;
    background-color: #f0f0f0;
    display: flex; /* Usa flexbox per centrare il contenuto */
    justify-content: center; /* Centra orizzontalmente */
    align-items: center; /* Centra verticalmente */
}
.utente{
    text-align:left;
    padding:30px;
}
.nome{
    color:rgba(170, 62, 83, 0.77);
    font-size:40px;
    font-weight:bold;

}
.dati{
    color:#db687b;
    font-size:18px;
}
/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
 
@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}
 
/* Responsive */
@media (max-width: 768px) {
    body > form {
        width: 95%;
        margin: 30px 20px 30px 20px;
    }
   
   h1 {
        font-size: 2.5rem;
    }
   
    
}
</style>
<?php
    include("conn.php");
    session_start();
?>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
             <img src="./images/png.png" alt="Logo" width="65" height="60" class="d-inline-block align-text-top">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./profiloUtente.php">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">

<form> 
    <h1>Lo charme che hai scelto✨</h1>
   
    <?php
    $query="SELECT *
     FROM matchutenti m INNER JOIN utenti u 
      ON m.id_utenteMatch=u.id_utenti INNER JOIN foto f
      ON f.id_utenti=u.id_utenti INNER JOIN carattaggiuntive c 
      ON u.id_utenti=c.id_utenti  INNER JOIN qualita q
      ON u.id_utenti=q.id_utenti INNER JOIN interessi i
      ON u.id_utenti=i.id_utenti INNER JOIN hobby h
      ON u.id_utenti=h.id_utenti
      WHERE u.id_utenti='$_POST[id_utenteMatch]'
    GROUP BY m.id_utenteMatch";
    $risu=mysqli_query($conn,$query)or die ("connessione fallita".mysqli_error($conn));
    //style='width:50%;height:20%;'
    if($risu->num_rows>0){
        while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){
       echo "<div class='foto'>";
       echo "<img src='./images/$row[foto]' class='card-img-top'>";
       echo "</div>";

       echo "<div class='utente'>";
       echo "<div class='nome'>";
       echo "<p>".$row['nome']." ".$row['cognome']."<p>";
       echo "</div>";

       echo "<div class='dati'>";
       echo "<p>".$row['eta']." "."anni</p>";
       echo "<span class='material-symbols-outlined'>mail</span>";
       echo "<p>".$row['email']."</p>";

       echo "<span class='material-symbols-outlined'>call</span>";
       echo "<p>".$row['num_telefono']."</p>";

       echo "<span style='font-weight:bold';>Segno zodiacale</span>"; 
       echo "<p>".$row['zodiaco']."</p>";

       echo "<span style='font-weight:bold';>Sport</span>"; 
       echo "<p>".$row['sport']."</p>";

       echo "<span style='font-weight:bold';>Carattere</span>"; 
       echo "<p>".$row['carattere']."</p>";

       echo "<span style='font-weight:bold';>Colore di capelli</span>"; 
       echo "<p>".$row['capelli']."</p>";

       echo "<span style='font-weight:bold';>Colore degli occhi</span>"; 
       echo "<p>".$row['occhi']."</p>";

       echo "<span style='font-weight:bold';>Altezza</span>"; 
       echo "<p>".$row['altezza']."</p>";

       echo "<span style='font-weight:bold';>Stile</span>"; 
       echo "<p>".$row['stile']."</p>";

        echo "<span style='font-weight:bold';>Sta cercando ?</span>"; 
       echo "<p>".$row['relazione']."</p>";

        echo "<span style='font-weight:bold';>Esprime il suo interesse con...</span>"; 
       echo "<p>".$row['esprimiAm']."</p>";

        echo "<span style='font-weight:bold';>Per approcciare...</span>"; 
       echo "<p>".$row['sentire']."</p>";

        echo "<span style='font-weight:bold';>Nel partner sta cercando...</span>"; 
       echo "<p>".$row['caratterePartner']."</p>";

        echo "<span style='font-weight:bold';>Nel tempo libero...</span>"; 
       echo "<p>".$row['descrizione']."</p>";

        echo "<span style='font-weight:bold';>Si definisce</span>"; 
       echo "<p>".$row['descrizionePersona']."</p>";
       echo  "</div>";
       echo "</div>";


       echo "<div class='footer'>";
       echo "<a href='./riassunto.php'>Indietro</a>";
       echo "</div>";
       echo "</div>";
       echo "</div>";
       
        }
    echo "</div>";
    }

    ?>
</form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">

</script>
</body>
</html>