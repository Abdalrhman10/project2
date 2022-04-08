
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);

$update = $database->prepare('UPDATE autogarage SET klantnaam = "" , klantadres = "" , klantpostcode = "", klantplaats = "" WHERE klantid = "" ');
$update->execute();



 if(isset($_GET['edit'])){
 $getitems = $database->prepare(" SELECT * FROM autogarage WHERE klantid = :id");
 $getitems->bindParam("id",$_GET['edit']);
 $getitems->execute(); 

 foreach($getitems AS $data){
    echo '<form method="post" >';
     echo "<input type='text' name='klantnaam' required value='".$data['Klantnaam']."'>";
     echo '<input type="text" name="klantadres" required value=" '. $data['klantadres'] . ' "> *</br>';
     echo "<input type='text' name='klantpostcode' required  value=' " .$data['Klantpostcode']. " '> *</br></br>";
     echo "<input type='text' name='klantplaats' required  value=' ".$data['klantplaats']." '> *</br></br>";
     echo '<button type="submit" name="update" required value="'.$data['klantid']. '">Wijzgen</button> ';
    echo '<a href="hoofd.php">terug</a>';
     echo '</form></br>';
     

 }

 if(isset(($_POST['update']))){
     $update = $database->prepare("UPDATE autogarage SET  klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantplaats = :klantplaats WHERE klantid = :klantid ");
     $update->bindParam("klantnaam",$_POST['klantnaam']);
     $update->bindParam("klantadres",$_POST['klantadres']);
     $update->bindParam("klantpostcode",$_POST['klantpostcode']);
     $update->bindParam("klantplaats",$_POST['klantplaats']);
     $update->bindParam("klantid",$_POST['update']);
     $update->execute();
     header("Location: update.php?edit=" . $_POST['update']);
 }
 }
?>
