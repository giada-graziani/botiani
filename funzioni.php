<?php
include('conn.php');
echo"";
$q="SELECT 
        *
FROM
    utenti
WHERE 
    email = '$_POST[email]' AND password= '$_POST[password]'";
$ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

if(mysqli_num_rows($ris)>0){
header("Location: match.php");
}
else{
    ?>
    <script>
        alert("Credenziali errate. Riprova.");
        window.location.href = "index.php";
    </script>
<?php
    
}
?>