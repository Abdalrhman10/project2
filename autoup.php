<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);

$update = $database->prepare('UPDATE autokl SET autokenteken = "" , automerk = "" , autotype = "", autokmstand = "" WHERE klantid = "" ');
$update->execute();



 if(isset($_GET['edit'])){
 $getitems = $database->prepare(" SELECT * FROM autokl WHERE klantid = :id");
 $getitems->bindParam("id",$_GET['edit']);
 $getitems->execute(); 

 foreach($getitems AS $data){
    echo '<form method="post" >';
     echo "<input type='text' name='klantnaam' required value='".$data['autokenteken']."'>";
     echo '<input type="text" name="klantadres" required value=" '. $data['automerk'] . ' "> *</br>';
     echo "<input type='text' name='klantpostcode' required  value=' " .$data['autotype']. " '> *</br></br>";
     echo "<input type='text' name='klantplaats' required  value=' ".$data['autokmstand']." '> *</br></br>";
     echo '<button type="submit" name="update" required value="'.$data['klantid']. '">Wijzgen</button> ';
    echo '<a href="hoofd.php">terug</a>';
     echo '</form></br>';
     

 }

 if(isset(($_POST['update']))){
     $update = $database->prepare("UPDATE autokl SET  autokenteken = :autokenteken, automerk = :automerk, autotype = :autotype, autokmstand = :autokmstand WHERE klantid = :klantid ");
     $update->bindParam("autokenteken",$_POST['autokenteken']);
     $update->bindParam("automerk",$_POST['automerk']);
     $update->bindParam("autotype",$_POST['autotype']);
     $update->bindParam("autokmstand",$_POST['autokmstand']);
     $update->bindParam("klantid",$_POST['update']);
     $update->execute();
     header("Location: autoup.php?edit=" . $_POST['update']);
 }
 }
?>