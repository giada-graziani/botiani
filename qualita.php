<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">   
     <link rel="stylesheet" href="style2.css">
     
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Mostraci il tuo charme</h1>
        <form action="hobby.php" method="POST">
            <label for="sport">Che sport fai?</label>
            <input type="text"name="sp" id="sport" required></input>
            <br>
            <br>
            <label for="caratt">Che caratteristica ti si addice di più?</label>
            <input type="text"name="caratteristica" id="caratt" required></input>
            <br>
            <br>

<label class="d-inline-flex gap-1" for="ani">
In quali di questi animali ti identifichi ?
</label>
<div class="btn-group" id="ani" name="animale" required>
 
<button  type="button" class="btn active" data-bs-toggle="button" aria-pressed="true" value="cane">Cane</button>
<button  type="button" class="btn active" data-bs-toggle="button" value="gatto">Gatto</button>
<button type="button" class="btn active" data-bs-toggle="button" value="tigre">Tigre</button>
<button type="button" class="btn active" data-bs-toggle="button" value="giraffa">Giraffa</button>
<button type="button" class="btn active" data-bs-toggle="button"value="leone">Leone</button>
<button type="button" class="btn active" data-bs-toggle="button" value="lupo">Lupo</button>
<button type="button" class="btn active" data-bs-toggle="button" value="tartaruga">Tartaruga</button>

</div>
        <br>
        <br>
        <label for="alc">Quanto bevi di solito?</label>
        <div class="btn-group" id="alc" name="bere" required>
<button type="button" class="btn active" data-bs-toggle="button" value="no">non fa per me</button>
<button type="button" class="btn active" data-bs-toggle="button" value="astemio">sono astemia/o</button>
<button type="button" class="btn active" data-bs-toggle="button" value="ogni">ogni tanto</button>
<button type="button" class="btn active" data-bs-toggle="button" value="spesso">spesso</button>
<button type="button" class="btn active" data-bs-toggle="button"value="compagnia">solo in compagnia</button>
<button type="button" class="btn active" data-bs-toggle="button" value="altro">altro</button>

</div>
          <br>
        <br>

        <label for="fu">Quanto spesso fumi?</label>
        <div class="btn-group" id="fu" name="fumo" required>
<button type="button" class="btn active" data-bs-toggle="button" value="no">non fa per me</button>
<button type="button" class="btn active" data-bs-toggle="button" value="ogni">ogni tanto</button>
<button type="button" class="btn active" data-bs-toggle="button" value="spesso">spesso</button>
<button type="button" class="btn active" data-bs-toggle="button"value="compagnia">solo in compagnia</button>
<button type="button" class="btn active" data-bs-toggle="button" value="altro">altro</button>

</div>
        <br>
        <br>
        <div class="input-group mb-1">
  <label class="input-group-text" for="inputGroupSelect01">Qual è il tuo segno zodiacale?</label>
  <select class="form-select" id="inputGroupSelect01" name="segno">
    <option selected>seleziona...</option>
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
<input type="submit" value="continua">
        <script>
            function updateCharCount() {
    const inputField = document.getElementById('myInput');
    const charCount = document.getElementById('charCount');
    const currentLength = inputField.value.length;
    charCount.textContent = `${currentLength}/30`;
  }
  </script>






</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">

</script>
</body>
</html>