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

.input-group-text{
    background-color: #db687b;
    border:none;
    color:white;
}
.form-select{
    background-color:rgb(225, 175, 177); 
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
 
input[type="text"],
input[type="number"],
input[list],
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 8px;
    border: none;
    outline: none;
    box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
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
    font-weight: bold;
    margin-top: 15px;
    display: block;
    color:#6e446b;
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
<body>
    <?php

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
              <input type="submit" value="Avanti"/>
         </form>
         </div>
 </div>
     </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>