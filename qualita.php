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
<?php
include("conn.php");
session_start();
if((isset($_POST['nome'])) && (isset($_POST['cognome'])) && (isset($_POST['eta'])) && (isset($_POST['telefono'])) && (isset($_POST['email'])) && (isset($_POST['password'])) && (isset($_POST['sesso']))){
    $_SESSION['utente'][]=["nome"=> $_POST['nome'], "cognome"=> $_POST['cognome'],"eta"=> $_POST['eta'], "telefono"=> $_POST['telefono'], "email"=> $_POST['email'], "password"=> $_POST['password'], "sesso"=> $_POST['sesso'] ];
}

?>
<form action="hobby.php" method="POST"> 
        <h1>Mostraci il tuo charme✨</h1>
        <p>racconta un pò di te...</p>
        <label for="sport">Che sport fai?</label>
        <input type="text" name="sp" id="sport" size="30" required placeholder="Es:pallavolo,calcio,danza..."></input>

        <br>
        <br>
        <label for="caratt">Che caratteristica ti si addice di più?</label>
        <input type="text"name="caratteristica" id="caratt" size="30" required placeholder="Es:simpatico/a,permaloso/a,gentile..."></input>
        <br>
        <br>
        <label class="d-inline-flex gap-1" for="animali">
In quali di questi animali ti identifichi ?
</label>
<div class="btn-group" role="group" id="animali">
            <input type="radio" class="btn-check" name="animale" id="ani" autocomplete="off" value="gatto">
            <label class="btn" for="ani" >Gatto</label>

            <input type="radio" class="btn-check" name="animale" id="ani2" autocomplete="off" value="tigre">
            <label class="btn" for="ani2">Tigre</label>

            <input type="radio" class="btn-check" name="animale" id="ani3" autocomplete="off" value="Leone" >
            <label class="btn" for="ani3">Leone</label>

            <input type="radio" class="btn-check" name="animale" id="ani4" autocomplete="off" value="squalo" >
            <label class="btn" for="ani4">Squalo</label>

            <input type="radio" class="btn-check" name="animale" id="ani5" autocomplete="off" value="volpe" >
            <label class="btn" for="ani5">Volpe</label>
            
        </div>


        <br>
        <br>
        <label for="alc">Quanto bevi di solito?</label>
        <div class="btn-group" role="group" id="alc">
            <input type="radio" class="btn-check" name="bere" id="bere1" autocomplete="off" value="no">
            <label class="btn" for="bere1" >Non fa per me</label>

            <input type="radio" class="btn-check" name="bere" id="bere2" autocomplete="off" value="astemio">
            <label class="btn" for="bere2">sono astemio</label>

            <input type="radio" class="btn-check" name="bere" id="bere3" autocomplete="off" value="ogni">
            <label class="btn" for="bere3">Ogni tanto</label>

            <input type="radio" class="btn-check" name="bere" id="bere4" autocomplete="off" value="spesso">
            <label class="btn" for="bere4">Spesso</label>

            <input type="radio" class="btn-check" name="bere" id="bere5" autocomplete="off" value="compagnia">
            <label class="btn" for="bere5">Solo in compagnia</label>
            
        </div>
        <br>
        <br>

<label for="fu">Quanto spesso fumi?</label>
<div class="btn-group" role="group" id="fu">
            <input type="radio" class="btn-check" name="fumo" id="fumo1" autocomplete="off" value="no">
            <label class="btn" for="fumo1">Non fa per me</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo2" autocomplete="off" value="ogni">
            <label class="btn" for="fumo2">Ogni tanto</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo4" autocomplete="off" value="spesso">
            <label class="btn" for="fumo4">Spesso</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo5" autocomplete="off" value="compagnia">
            <label class="btn" for="fumo5">Solo in compagnia</label>
            
        </div>
        <br>
        <br>
        <div class="input-group mb-1">
  <label class="input-group-text" for="inputGroupSelect01">Qual è il tuo segno zodiacale?</label>
  <select class="form-select" id="inputGroupSelect01" name="segno">
    <option value="gemelli">Gemelli</option>
    <option value="toro">Toro</option>
    <option value="Pesci">Pesci</option>
    <option value="ariete">Ariete</option>
    <option value="cancro">Cancro</option>
    <option value="leone">Leone</option>
    <option value="vergine">Vergine</option>
    <option value="bilancia">Bilancia</option>
    <option value="scorpione">Scorpione</option>
    <option value="sagittario">Sagittario</option>
    <option value="acquario">Acquario</option>

  </select>
</div>
<br>
        <label for="myInput">Trova delle parole per descriverti al meglio</label>
        <div class="input-container">
        <input type="text"id="myInput" name="myInput" maxlength="30" oninput="updateCharCount()" required> </input>
        <span id="charCount">0/30</span>
</div>
<br>
<br>
  <div>
    <input type="submit" value="Avanti"/>
    </form>
 </div>

</div>

<script>
    function updateCharCount() {
    const inputField = document.getElementById('myInput');
    const charCount = document.getElementById('charCount');
    const currentLength = inputField.value.length;
    charCount.textContent = `${currentLength}/30`;
  }
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">

</script>
</body>
</html>