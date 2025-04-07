<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Mostraci il tuo charme</h1>
        <form action="hobby.php" method="php">
            <label for="sport">Che sport fai?</label>
            <input type="text"name="sp" id="sport" required></input>
            <br>
            <br>
            <label for="caratt">Che caratteristica ti si addice di più?</label>
            <input type="text"name="caratteristica" id="caratt" required></input>
            <br>
            <br>
            <label for="ani">In quale di questi animali ti identifichi?</label>
            <select name="animale" id="ani" required>
            <option value="cane">cane</option>
            <option value="gatto">gatto</option>
            <option value="tigre">tigre</option>
            <option value="leone">gatto</option>
            <option value="giraffa">giraffa</option>
            <option value="altro">altro</option>
        </select>
        <br>
        <br>
        <label for="alc">Quanto bevi di solito?</label>
            <select name="bere" id="alc" required>
            <option value="no">non fa per me</option>
            <option value="astemio">sono astemia/o</option>
            <option value="ogni">ogni tanto</option>
            <option value="spesso">spesso</option>
            <option value="compagnia">solo in compagnia</option>
            <option value="altro">altro</option>
            
        </select>
        <br>
        <br>
        <label for="fu">Quanto spesso fumi?</label>
            <select name="fumo" id="fu" required>
            <option value="no">non fa per me</option>
            <option value="ogni">ogni tanto</option>
            <option value="spesso">spesso</option>
            <option value="compagnia">solo in compagnia</option>
            <option value="altro">altro</option>
            
        </select>
        <br>
        <br>
        //questo farlo con dei bottoni sparsi
        <label for="zodi">Qual è il tuo segno zodiacale?</label>
            <select name="segno" id="zodi" required>
            <option value="gemelli">Gemelli</option>
            <option value="toro">toro</option>
            <option value="pesci">pesci</option>
            <option value="ariete">ariete</option>
            <option value="cancro">cancro</option>
            <option value="leone">leone</option>
            <option value="vergine">vergine</option>
            <option value="bilancia">bilancia</option>
            <option value="scorpione">scorpione</option>
            <option value="sagittario">sagittario</option>
            <option value="acquario">acquario</option>
            
        </select>
        <br>
        <br>
        <label for="parole">Trova delle parole per descriverti al meglio</label>
        <input id="parole" name="descrizione"required> </input>
<br>
<br>
<input type="submit" value="continua">

</form>
</div>
</body>
</html>