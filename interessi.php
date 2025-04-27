<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
</head>
<style>
form {
    animation: fadeIn 1s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

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
.form-group {
    margin-bottom: 15px;

}
label {
    font-size: 1rem;
    margin-bottom:5px;
    display: block;
}
input[type="text"], input[type="number"], select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
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
<body>
    <?php
    include("conn.php");
    session_start();
    //da interessi prendi estetica

    session_start();
    include("conn.php");
   
    if(isset($_POST['hobby']) && isset($_POST['sentire'])&& isset($_POST['esprimi'])){
        $_SESSION['hobby'][]=["hobby"=> $_POST['hobby'], "sentire"=> $_POST['sentire'],"esprimi"=> $_POST['esprimi']];
    }

   ?>
<div class="container">
    
    <h1>Che charme cerchi?</h1>
     <form action="raccoltaDati.php" method="post" >
         <div class="form-group">
             <label for="gen">Genere</label>
             <select id="gen" name="genere" required>
                 <option value="maschio">Maschio</option>
                 <option value="femmina">Femmina</option>
                 <option value="entrambi">Entrambi</option>
             </select>
         </div>
         <div class="form-group">
             <label for="carat">Qual è la caratteristica più importante che stai cercando?</label>
             <input type="text" id="carat" name="cerchi" required placeholder="Es: Onestà, umorismo...">
         </div>
         <div class="form-group">
             <label for="capelli">Che colore di capelli ti attrae?</label>
             <input type="text" id="capelli" name="colCapelli" required placeholder="Es: Castani, biondi, rossi...">
         </div>
         <div class="form-group">
             <label for="occhi">E per quanto riguarda gli occhi?</label>
             <input type="text" id="occhi" name="colOcchi" required placeholder="Es: Azzurri, verdi, marroni...">
         </div>
 
         <div class="form-group">
             <label for="cm">Quanto vorresti fosse alto/a?</label>
             <input type="number" id="cm" name="altezza" required placeholder="Es: 170 cm">
         </div>
 
         <div class="form-group">
             <label for="sti">Quale stile dovrebbe avere la persona che cerchi?</label>
             <input type="text" id="sti" name="stile" required placeholder="Es: Casual, elegante, sportivo...">
         </div>
  
         <div class="form-group">
             <label for="perche">Perché hai deciso di iscriverti a Charme?</label>
             <input type="text" id="perche" name="ragione" required placeholder="Es: Voglio una relazione seria, voglio fare nuove conoscenze...">
         </div>
         <div>
              <button type="submit" >Avanti</button>
         </form>
         </div>
 </div>
     </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>