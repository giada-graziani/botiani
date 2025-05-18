<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>
<body>
    <?php
        require("conn.php");
        session_start();

        $utenteCorrente = end($_SESSION['utente']);
        $q="SELECT 
                *
            FROM 
                utenti
            WHERE
                email='$utenteCorrente[email]'"; 
        $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
        
        while($row= mysqli_fetch_assoc($ris)){
            $idU=$row['id_utenti'];
        }
        echo"<p hidden='hidden' id='idU'>$idU</p>";
        $_SESSION['idU']=$idU;
    ?>
    <div class="contenitore">
        <div class="header">
            <h1>Completa la tua descrizione</h1>
        </div>
        <div class="contenitore">
            <!--IMMAGINE -->
            <label for="fileInput">Inserisci la tua foto prfilo:</label>
            <div class="fotoContainer">
                <input type="file" id="fileInput" accept="image/*" name="image" />
                <img id="preview" src="" alt="Anteprima" class="profile-picture" style="display:none;" />
                <span class="add-icon">+</span>
            </div>
            <div id="message">
                <small><strong id="uploadStatus"></strong></small>
            </div> 
            <br />
            <br />

            <label>Colore degli occhi: </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriOcchi" id="occhi" required>
                <input type="radio" class="btn-check" name="optionsOcchi" id="option1O" autocomplete="off" value="Marroni">
                <label class="btn" for="option1O">Marroni</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option2O" autocomplete="off" value="Grigi">
                <label class="btn" for="option2O">Grigi</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option3O" autocomplete="off" value="Verdi">
                <label class="btn" for="option3O">Verdi</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option4O" autocomplete="off" value="Neri">
                <label class="btn" for="option4O">Neri</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option5O" autocomplete="off" value="Blu">
                <label class="btn" for="option5O">Blu</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option6O" autocomplete="off" value="Azzurri">
                <label class="btn" for="option6O">Azzurri</label>
            </div>
            <br />
            <br />
            <label>Colore dei capelli: </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriCapelli" id="capelli" required>
                <input type="radio" class="btn-check" name="optionsCapelli" id="option1C" autocomplete="off" value="Castani">
                <label class="btn" for="option1C">Castani</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option2C" autocomplete="off" value="Mori">
                <label class="btn" for="option2C">Mori</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option3C" autocomplete="off" value="Biondi">
                <label class="btn" for="option3C">Biondi</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option4C" autocomplete="off" value="Rossi">
                <label class="btn" for="option4C">Rossi</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option5C" autocomplete="off" value="Neri">
                <label class="btn" for="option5C">Neri</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option6C" autocomplete="off" value="Altro">
                <label class="btn" for="option6C">Altro</label>
            </div>
            <br />
            <br />
            <label for="altezze">Qual'e la tua altezza?(in centimetri): </label>
            <input type="number" id="altezze" name="altezza" min="120" max="300" placeholder="Es: 170 cm" required>
            <br />
            <br />
            <label>Quale stile ti rappresenta di più? : </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="stile" id="stili" required>
                <input type="radio" class="btn-check" name="optionsStili" id="option1S" autocomplete="off" value="Baggy">
                <label class="btn" for="option1S">Baggy</label>

                <input type="radio" class="btn-check" name="optionsStili" id="option2S" autocomplete="off" value="Casual">
                <label class="btn" for="option2S">Casual</label>

                <input type="radio" class="btn-check" name="optionsStili" id="option3S" autocomplete="off" value="Elegante">
                <label class="btn" for="option3S">Elegante</label>

                <input type="radio" class="btn-check" name="optionsStili" id="option4S" autocomplete="off" value="Streetwear">
                <label class="btn" for="option4S">Streetwear</label>

                <input type="radio" class="btn-check" name="optionsStili" id="option5S" autocomplete="off" value="Goth">
                <label class="btn" for="option5S">Goth</label>

                <input type="radio" class="btn-check" name="optionsStili" id="option6S" autocomplete="off" value="Sportivo">
                <label class="btn" for="option6S">Sportivo</label>
            </div>   
            <br />
            <br /> 
            
        </div>
        <div>
            <button id='conferma'> Continua</button>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>


<script type=text/javascript>
    $(document).ready(function(){ 
        let idU = document.getElementById('idU').innerText;
        let fotoCaricata = false;

        //PREVIEW---
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.add-icon').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        })

        $("#conferma").click(function(){
            let occhiChecked = document.querySelector("[name='optionsOcchi']:checked");
            let capelliChecked = document.querySelector("[name='optionsCapelli']:checked");
            let altezza = document.getElementById("altezze").value;
            let stileChecked = document.querySelector("[name='optionsStili']:checked");
            let fileInput = document.getElementById("fileInput");
            
            // Valori per i campi btn
            const occhi = occhiChecked.value;
            const capelli = capelliChecked.value;
            const stile = stileChecked.value;
            
            // inserisco tutti i valori all'inteno di formData per la chiamata ajax
            const formData = new FormData();
            formData.append('image', fileInput.files[0]);
            formData.append('idUtente', idU);
            formData.append('action', 'caricaFoto');
            // perchè functionname non può essere inviato nella chiamata ajax, poichè non invierebbe i dati di formData correttamente
            formData.append('functionname', "inserimentoFoto");

            
            $.ajax({
                url: "operazioniData.php",
                type: "POST",
                data: formData,
                processData: false,  // impedisce a jQuery di processare i dati
                contentType: false,  // impedisce a jQuery di impostare contentType
                dataType: "json",
                success: function(response) {
                    if(response.success) {
                        // Foto caricata con successo, procedi con il resto dei dati
                        $("#uploadStatus").text("Foto caricata con successo!");
                        fotoCaricata = true;
                        
                        // Ora invia gli altri dati
                        $.ajax({
                            url: "operazioniData.php",
                            data: {
                                functionname: "estetica",
                                occhi: occhi,
                                capelli: capelli,
                                altezza: altezza,
                                stile: stile,
                                idU: idU
                            },
                            method: "POST",
                            dataType: "JSON",
                            success: function(result) {
                                if(result.esito == 'successo') {
                                    window.location.href = "match.php";
                                } else {
                                    alert("I dati non sono stati inseriti correttamente");
                                }
                            },
                            error: function() {
                                alert("Si è verificato un errore durante l'invio dei dati");
                            }
                        });
                    } else {
                        $("#uploadStatus").text("Errore nel caricamento della foto: " + response.message);
                        alert("Errore nel caricamento della foto: " + response.message);
                    }
                },
                error: function() {
                    alert("Si è verificato un errore durante il caricamento della foto");
                    $("#uploadStatus").text(" " );
                }
            });
        });
    });
</script>