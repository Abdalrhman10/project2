<html>
<body>
    

<?php


$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);



if(isset($_POST['send'])){
    
   $klantnaam = $_POST['klantnaam'];
   $klantadres = $_POST['klantadres'];
   $klantpostcode = $_POST['klantpostcode'];
   $klantplaats = $_POST['klantplaats'];
   
$addData =$database->prepare("INSERT INTO autogarage(klantnaam,klantadres,klantpostcode,klantplaats) 
VALUES('$klantnaam','$klantadres','$klantpostcode','$klantplaats')");
$addData->execute();
}



?>

<form method="POST">
    


klantnaam :<input type="text" name="klantnaam" required/>
<br>
klantadres :<input type="text" name="klantadres" required/>
<br>
klantpostcode :<input type="text" name="klantpostcode" required />
<br>
klantplaats<input type="text" name="klantplaats" required/>
<br>
<button type="submit" name="send">send</button>


</form>


</body>
</html>
