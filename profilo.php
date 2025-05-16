<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">   
     <link rel="stylesheet" href="style2.css">
     
    <title>Charme</title>
</head>
<body>
<style>
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
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}
h1 {
    font-size: 2.8rem;
    margin-bottom: 10px;
    color: #722c44;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
input[type="text"]{
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 8px;
    border: none;
    outline: none;
    box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
    
}
.input-group-text{
    background-color: rgb(225, 175, 177); ;
    border:none;
    color:#6e446b;
}
.form-select{
    background-color: rgb(236, 194, 195); ;
    border:none;
    color:#6e446b;
}
h1{
    text-align:center;
}
p{
    font-size:13px;
    text-align:center;
    font-style:italic;
    color:#6e446b;
}
.btn-check:checked + .btn {
  background-color: #e94e68; /* Rosa chiaro quando selezionato */
  color: white;
  border:none;
}
.btn-group .btn{
      border-radius: 25px;
      font-size: 13px;
      text-align:center;
      transition: all 0.3s ease;
      background-color:rgb(225, 175, 177); /* Beige caldo */
    color: #6e446b; /* Colore del testo che si abbina allo sfondo */
    border: 1px solid #e1b7b7; /* Bordi dello stesso colore */
    }

/* Rimuovi il margine sull'ultimo bottone per evitare uno spazio extra */
.btn-group .btn:last-child {
    margin-right: 0;
}

/* Hover: Cambia il colore quando si passa sopra */
.btn-group .btn:hover {
    background-color:#db687b ; /* Un rosa chiaro per l'effetto hover */
    color: #fff; /* Cambia il colore del testo al passaggio */
}


/* Focus (per quando il bottone è selezionato) */
.btn-group .btn:focus {
    outline: none;
    box-shadow: 0 0 5px 2px rgba(200, 100, 120, 0.6); /* Sfumatura rosa per il focus */
}

input[type="submit"] {
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
}
input[type="submit"]:hover {
    background-color: #e94e68;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
}
label{
   color: #6e446b;
   font-weight: bold;
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
    <div class="container">

<form action="hobby.php" method="POST"> 
    <h1>✨</h1>
    <?php
include("conn.php");
session_start();
    $query="SELECT *
     FROM matchutenti m INNER JOIN utenti u 
      ON m.id_utenteMatch=u.id_utenti INNER JOIN foto f
      ON f.id_utenti=u.id_utenti
      WHERE m.id_utenti='$_SESSION[idU]'
      GROUP BY m.id_utenteMatch";
    $risu=mysqli_query($conn,$query)or die ("connessione fallita".mysqli_error($conn));
    
    if($risu->num_rows>0){
        while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){
    
       echo "<img src='./images/$row[foto]' style='width:100%;height:100%;' class='card-img-top'>";

       echo "<div class='utente'>";
       echo "<h5 class='card-title'>".$row['nome']." ".$row['cognome']."</h5>";
       echo "<p class='card-text'style='font-weight:bold;'> eta'<span style='font-weight:normal;'>: ".$row['eta']."</span></p>";
       echo "</div>";
       echo "<div class='footer'>";
       echo "<a href='profilo.php' class='btn btn-primary'>Torna Indietro</a>";
       echo "</div>";
       echo "</div>";
       echo "</div>";
       
        }
        echo "</div>";
    }
    ?>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">

</script>
</body>
</html>