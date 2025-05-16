<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Charme</title>
</head>
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
            margin-bottom:25px;
        }
    
        .card{
            background: #ff9a9e;
            margin:15px 25px 25px 15px;
            text-align:left;
        }
       h5{
        
        font-size:28px;
        color:rgb(162, 0, 5);
       }
      .utente{
          height:80px;
          padding-top:15px;
          text-align:left;
          width:500px;
      }
      .footer{
          text-align:center;
          padding-top:20px;
      }
   </style> 
<body>
    <div>
<form action='profilo.php' method='POST'>
    <h1>Ecco i tuoi match</h1>

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
       echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
        while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){
     
        echo "<div class='card' style='width: 15rem;'>";
       echo "<div class='card-body'>";
       echo "<div style='height:300px;'>";
       echo "<img src='./images/$row[foto]' style='width:100%;height:100%;' class='card-img-top'>";
       echo "</div>";
       echo "<div class='utente'>";
       echo "<h5 class='card-title'>".$row['nome']." ".$row['cognome']."</h5>";
       echo "<p class='card-text'style='font-weight:bold;'> eta'<span style='font-weight:normal;'>: ".$row['eta']."</span></p>";
       echo "</div>";
       echo "<div class='footer' name='idUtenteMatch'>";
       echo "<input type='submit' value='$row[id_utenteMatch]'>Visualizza profilo</>";
       echo "</div>";
       echo "</div>";
       echo "</div>";
       
        }
        echo "</div>";
    }
    ?>
   
  </div>
</div>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>