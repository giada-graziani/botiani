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

        echo"$_SESSION[utente]['email']";
        $q="SELECT 
                id_utenti
            FROM 
                utenti
            WHERE
                email='$_SESSION[utente][email]'";
        
    ?>
    <div>
        <div class="header">
            <!--GIADA-->
            <h1>Completa la tua descrizione</h1>
        </div>
        <div class="formCliccami">
            <!--IMMAGINE -->
            <div class="fotoContainer">
                <form enctype="multipart/form-data" method="post">
                <input type="file" id="fileInput" accept="image/*" name="image" />
                <img id="preview" src="" alt="Anteprima" class="profile-picture" style="display:none;" />
                <span class="add-icon">+</span>
            </div>
            <input type="submit" name="carica" id="uploadButton" value="Carica Foto">
                </form>
            <!--<button id="uploadButton">Carica Foto</button>-->
            <div id="message">
                <small><strong>
            <?php
                if (isset($_FILES['image'])) {
                    // Specifica la cartella di destinazione
                    $targetDir = "images/"; // Assicurati che questa cartella esista e sia scrivibile
                    $file=$_FILES['image']['name'];
                    $targetFile = $targetDir . basename($file);
                    $uploadOk = 1;
                    $idU=1;
                    $caricato = false;

                    // Controlla se il file è un'immagine (opzionale)
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if (isset($_POST["carica"])) {
                        echo"uuuuuuuuuuuuuuuuuuuuuuuuuuuu";
                        if(!empty($_FILES['image']['tmp_name'])){
                            $check = getimagesize($_FILES['image']['tmp_name']);
                            if ($check === false) {
                                echo"yyyyyyyyyyyyyyyyyyyyy";
                            echo "Il file non è un'immagine.";
                                $uploadOk = 0;
                            } 
                            else {
                            echo"oooooooooooooooooooooooooooooooooo";
                                $uploadOk = 1;
                                // Controlla se il file esiste già
                            if (file_exists($targetFile) OR $check["mime"]!="image/jpeg") {
                                echo "Spiacente, il file esiste già.";
                                $uploadOk = 0;
                            }
        
                            // Controlla la dimensione del file (opzionale)
                            if ($_FILES['image']['size'] > 500000) { // Limite di 500KB
                                echo "Spiacente, il file è troppo grande.";
                                $uploadOk = 0;
                            }
        
                            // Consenti solo determinati formati di file (opzionale)
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "Spiacente, solo file JPG, JPEG, PNG e GIF sono consentiti.";
                                $uploadOk = 0;
                            }
                            echo"nnnnnnnnnnnnnnnnnnnnnnn";
                            // Controlla se $uploadOk è impostato su 0 a causa di un errore
                            if ($uploadOk != 0 ) {
                                echo"qqqqqqqqqqqqqqqqq";
                                $q = "INSERT INTO
                                        foto
                                        (id_utenti, foto)
                                    VALUES
                                        ('$idU', '$file')";
                                echo"rrrrrrrrrrrrrrrrrrrrrr";
                                $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));
                                if($ris){ 
                                    // Se tutto è a posto, prova a caricare il file
                                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                                        echo "Il file è stato caricato.";
                                        $caricato = true;
                                    } else {
                                        echo "Spiacente, si è verificato un errore durante il caricamento del tuo file.";
                                    }
                                }
                                else{
                                    echo "Non è stato inserito nel db correttamente";
                                }
                            }
                                }
                        }
                        
                    }
                    echo "<span class='d-none' id='id_carica'>$caricato</span>";

                    
                }
                ?>
                </strong></small>
            </div> 
            <br />
            <br />

                <label >Colore degli occhi: </label>
                <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriOcchi" id="occhi">
                    <input type="radio" class="btn-check" name="optionsOcchi" id="option1O" autocomplete="off" value="Marroni" checked>
                    <label class="btn btn-danger" for="option1O">Marroni</label>

                    <input type="radio" class="btn-check" name="optionsOcchi" id="option2O" autocomplete="off" value="Grigi">
                    <label class="btn btn-danger" for="option2O">Grigi</label>

                    <input type="radio" class="btn-check" name="optionsOcchi" id="option3O" autocomplete="off" value="Verdi">
                    <label class="btn btn-danger" for="option3O">Verdi</label>

                    <input type="radio" class="btn-check" name="optionsOcchi" id="option4O" autocomplete="off" value="Neri">
                    <label class="btn btn-danger" for="option4O">Neri</label>

                    <input type="radio" class="btn-check" name="optionsOcchi" id="option5O" autocomplete="off" value="Blu">
                    <label class="btn btn-danger" for="option5O">Blu</label>

                    <input type="radio" class="btn-check" name="optionsOcchi" id="option6O" autocomplete="off" value="Azzurri">
                    <label class="btn btn-danger" for="option6O">Azzurri</label>
                </div>
                <br />
                <br />
                <label >Colore dei capelli: </label>
                <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriCapelli" id="capelli">
                    <input type="radio" class="btn-check" name="optionsCapelli" id="option1C" autocomplete="off" value="Castani" checked>
                    <label class="btn btn-danger" for="option1C">Castani</label>

                    <input type="radio" class="btn-check" name="optionsCapelli" id="option2C" autocomplete="off" value="Mori">
                    <label class="btn btn-danger" for="option2C">Mori</label>

                    <input type="radio" class="btn-check" name="optionsCapelli" id="option3C" autocomplete="off" value="Biondi">
                    <label class="btn btn-danger" for="option3C">Biondi</label>

                    <input type="radio" class="btn-check" name="optionsCapelli" id="option4C" autocomplete="off" value="Rossi">
                    <label class="btn btn-danger" for="option4C">Rossi</label>

                    <input type="radio" class="btn-check" name="optionsCapelli" id="option5C" autocomplete="off" value="Neri">
                    <label class="btn btn-danger" for="option5C">Neri</label>

                    <input type="radio" class="btn-check" name="optionsCapelli" id="option6C" autocomplete="off" value="Biondi">
                    <label class="btn btn-danger" for="option6C">Altro</label>
                </div>
                <br />
                <br />
                <label for="altezze">Qual'e la tua altezza?(in centimetri): </label>
                <input type="number" id="altezze" name="altezza" min="120" max="300" required>
                <br />
                <br />
                <label >Quale stile ti rappresenta di più? : </label>
                <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="stile" id="stili">
                    <input type="radio" class="btn-check" name="optionsStili" id="option1S" autocomplete="off" value="Baggy" checked>
                    <label class="btn btn-danger" for="option1S">Baggy</label>

                    <input type="radio" class="btn-check" name="optionsStili" id="option2S" autocomplete="off" value="Casual">
                    <label class="btn btn-danger" for="option2S">Casual</label>

                    <input type="radio" class="btn-check" name="optionsStili" id="option3S" autocomplete="off" value="Elegante">
                    <label class="btn btn-danger" for="option3S">Elegante</label>

                    <input type="radio" class="btn-check" name="optionsStili" id="option4S" autocomplete="off" value="Streetwear">
                    <label class="btn btn-danger" for="option4S">Streetwear</label>

                    <input type="radio" class="btn-check" name="optionsStili" id="option5S" autocomplete="off" value="Goth">
                    <label class="btn btn-danger" for="option5S">Goth</label>

                    <input type="radio" class="btn-check" name="optionsStili" id="option6S" autocomplete="off" value="Sportivo">
                    <label class="btn btn-danger" for="option6S">Sportivo</label>
                </div>   
                <br />
                <br /> 
                
            </div>
            <div>
                <button id='conferma'> Continua</button>
                <!--<input type="submit" value="Continua" id="conferma">-->
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>


<script type=text/javascript>
$(document).ready(function(){//quando la pagina è pronta 
    const idU= 1;

    //PREVIEW-----------------------------
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
});

    //------------------------
    $("#conferma").click(function(){
        
        const occhi= document.querySelector("[name='optionsOcchi']:checked").value;
        const capelli= document.querySelector("[name='optionsCapelli']:checked").value;
        const altezza= document.getElementById("altezze").value;
        const stile= document.querySelector("[name='optionsStili']:checked").value;
        const carica= document.getElementById("id_carica").textContent;
        console.log(carica);

        console.log(occhi);
        console.log(capelli);
        console.log(altezza);
        console.log(stile);
    
        if(altezza && carica) {
            $.ajax(
                {url: "operazioniData.php",
                data: "functionname=estetica&occhi="+occhi+"&capelli="+capelli+"&altezza="+altezza+"&stile="+stile+"&idU="+idU,   
                method:"POST",
                dataType: "JSON",
                success: function(result){
                    //CONTROLLARE PERCHè RESULT NON RESULTA
                    if(result.esito == 'successo'){
                        window.location.href="interessi.php";
                    }
                    else{
                        alert("i dati non sono stati inseriti correttamente");
                        window.location.reload();
                    }
                    
                    }
                }
            );
        }
        else{
            alert("i dati non sono stati inseriti correttamente");
        }

    });

});

</script>