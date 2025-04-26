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
        form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 15px;
    width: 600px;
    margin: 0 auto;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}
body {
    background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    color: #333;
}
h1 {
    text-align: center;
    color: rgb(132, 11, 15);
    padding-bottom:10px;
}
input[type="text"]{
    background-color:rgb(225, 175, 177);
    border:none;
    font-style:italic;
    width: 100%;
    padding: 10px;
        margin: 5px 0;
    border-radius: 5px;
    font-size: 1rem;
}
.input-group-text{
    background-color: #ff9a9e;
    border:none;
}
.form-select{
    background-color:rgb(225, 175, 177); 
    border:none;
}
h1{
    text-align:center;
}
p{
    font-size:13px;
    text-align:center;
    font-style:italic;
}
.btn-group .btn{
      border-radius: 25px;
      font-size: 13px;
      text-align:center;
      transition: all 0.3s ease;
      
    }

button {
    background-color: #db687b;
    color: white;
    border: none;
    padding: 12px 20px;
    margin-top: 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button:hover {
    background-color: #e94e68;
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
        <h1>Mostraci il tuo charme</h1>
        <p>racconta un pò di te...</p>
        <label for="sport">Che sport fai?</label>
        <input type="text" name="sp" id="sport" size="30" required placeholder="Es:pallavolo,calcio,danza..."></input>
            <br>
            <br>
        <label for="caratt">Che caratteristica ti si addice di più?</label>
            <input type="text"name="caratteristica" id="caratt" size="30" required placeholder="Es:simpatico/a,permaloso/a,gentile..."></input>
            <br>
            <br>

<label class="d-inline-flex gap-1" for="ani">
In quali di questi animali ti identifichi ?
</label>
<div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="animale" id="ani" autocomplete="off">
            <label class="btn btn-outline-danger" for="ani" value="gatto">Gatto</label>
            <input type="radio" class="btn-check" name="animale" id="ani2" autocomplete="off">
            <label class="btn btn-outline-danger" for="ani2" value="tigre">Tigre</label>
            <input type="radio" class="btn-check" name="animale" id="ani3" autocomplete="off">
            <label class="btn btn-outline-danger" for="ani3" value="Leone">Leone</label>
            <input type="radio" class="btn-check" name="animale" id="ani4" autocomplete="off">
            <label class="btn btn-outline-danger" for="ani4" value="squalo">Squalo</label>
            <input type="radio" class="btn-check" name="animale" id="ani5" autocomplete="off">
            <label class="btn btn-outline-danger" for="ani5" value="volpe">Volpe</label>
            
        </div>


        <br>
        <br>
        <label for="alc">Quanto bevi di solito?</label>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="bere" id="bere1" autocomplete="off">
            <label class="btn btn-outline-danger" for="bere1" value="no">Non fa per me</label>
            <input type="radio" class="btn-check" name="bere" id="bere2" autocomplete="off">
            <label class="btn btn-outline-danger" for="bere2" value="astemio">sono astemio</label>
            <input type="radio" class="btn-check" name="bere" id="bere3" autocomplete="off">
            <label class="btn btn-outline-danger" for="bere3" value="ogni">Ogni tanto</label>
            <input type="radio" class="btn-check" name="bere" id="bere4" autocomplete="off">
            <label class="btn btn-outline-danger" for="bere4" value="spesso">Spesso</label>
            <input type="radio" class="btn-check" name="bere" id="bere5" autocomplete="off">
            <label class="btn btn-outline-danger" for="bere5" value="compagnia">Solo in compagnia</label>
            
        </div>
        <br>
        <br>

<label for="fu">Quanto spesso fumi?</label>
<div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="fumo" id="fumo1" autocomplete="off">
            <label class="btn btn-outline-danger" for="fumo1" value="no">Non fa per me</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo2" autocomplete="off">
            <label class="btn btn-outline-danger" for="fumo3" value="ogni">Ogni tanto</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo4" autocomplete="off">
            <label class="btn btn-outline-danger" for="fumo4" value="spesso">Spesso</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo5" autocomplete="off">
            <label class="btn btn-outline-danger" for="fumo5" value="compagnia">Solo in compagnia</label>
            
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
    <button type="submit">Avanti</button>
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