<label class="d-inline-flex gap-1" for="animali">
In quali di questi animali ti identifichi ?
</label>
<div class="btn-group" role="group" id="animali">
            <input type="radio" class="btn-check" name="animale" id="ani" autocomplete="off" value="gatto">
            <label class="btn btn-outline-danger" for="ani" >Gatto</label>

            <input type="radio" class="btn-check" name="animale" id="ani2" autocomplete="off" value="tigre">
            <label class="btn btn-outline-danger" for="ani2">Tigre</label>

            <input type="radio" class="btn-check" name="animale" id="ani3" autocomplete="off" value="Leone" >
            <label class="btn btn-outline-danger" for="ani3">Leone</label>

            <input type="radio" class="btn-check" name="animale" id="ani4" autocomplete="off" value="squalo" >
            <label class="btn btn-outline-danger" for="ani4">Squalo</label>

            <input type="radio" class="btn-check" name="animale" id="ani5" autocomplete="off" value="volpe" >
            <label class="btn btn-outline-danger" for="ani5">Volpe</label>
            
        </div>


        <br>
        <br>
        <label for="alc">Quanto bevi di solito?</label>
        <div class="btn-group" role="group" id="alc">
            <input type="radio" class="btn-check" name="bere" id="bere1" autocomplete="off" value="no">
            <label class="btn btn-outline-danger" for="bere1" >Non fa per me</label>

            <input type="radio" class="btn-check" name="bere" id="bere2" autocomplete="off" value="astemio">
            <label class="btn btn-outline-danger" for="bere2">sono astemio</label>

            <input type="radio" class="btn-check" name="bere" id="bere3" autocomplete="off" value="ogni">
            <label class="btn btn-outline-danger" for="bere3">Ogni tanto</label>

            <input type="radio" class="btn-check" name="bere" id="bere4" autocomplete="off" value="spesso">
            <label class="btn btn-outline-danger" for="bere4">Spesso</label>

            <input type="radio" class="btn-check" name="bere" id="bere5" autocomplete="off" value="compagnia">
            <label class="btn btn-outline-danger" for="bere5">Solo in compagnia</label>
            
        </div>
        <br>
        <br>

<label for="fu">Quanto spesso fumi?</label>
<div class="btn-group" role="group" id="fu">
            <input type="radio" class="btn-check" name="fumo" id="fumo1" autocomplete="off" value="no">
            <label class="btn btn-outline-danger" for="fumo1">Non fa per me</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo2" autocomplete="off" value="ogni">
            <label class="btn btn-outline-danger" for="fumo2">Ogni tanto</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo4" autocomplete="off" value="spesso">
            <label class="btn btn-outline-danger" for="fumo4">Spesso</label>
            <input type="radio" class="btn-check" name="fumo" id="fumo5" autocomplete="off" value="compagnia">
            <label class="btn btn-outline-danger" for="fumo5">Solo in compagnia</label>
            
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