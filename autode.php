<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>




<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);

//$removeitem = $database->prepare("DELETE FROM autokl");
//$removeitem->execute();

 $getitems = $database->prepare(" SELECT * FROM autokl");
 $getitems->execute();
 ?>
 
 <html>
 <body id="idbodd">
 <table class="tableid">
 <tr class="hooo">
     <th class="hoo">autokenteken</th>
     <th class="hoo">automerk</th>
     <th class="hoo">autotype</th>
     <th class="hoo">autokmstand</th>
     <th class="hoo">klantid</th>
     
   </tr>
   <?php
 foreach($getitems AS $data){	
   echo "<tr>";
 
 echo "<td>" . $data['autokenteken'] . "</td>";
 echo "<td>" . $data['automerk'] . "</td>";
 echo "<td>" . $data['autotype'] . "</td>";
 echo "<td>" . $data['autokmstand'] . "</td>";
 echo "<td>" .$data['klantid'] . "</td>";
 echo "<td>";
 echo '<a class="aupd" href="update.php?edit= '. $data['klantid'] . ' ">wijzegen</a>';
 //echo "<form method='post' action='update.php'>";
// echo "<input type='hidden' name='edit' value=' " . $data['klantid'] ." ' />";
// echo "<input type='submit' name='edit' value='Bewerken'/></form>";
 echo "</td>";
 echo "<td>";
 echo '<form method="POST"> <button  type="submit" name="remove" value=" '. $data['klantid'] .' ">Delete</button></form>';
 //echo "<form method='POST'><butten name='remove' value=' " .$data['klantid'] . " ' type='hidden' ></form>";
 //echo "<input type='submit' name='remove' value='Verwijderen'/>";
 echo "</td>";
 echo "</tr>";

 
}

 

 if(isset($_POST['remove'])){
   $removeklant = $database->prepare("DELETE  FROM autokl WHERE klantid = :id ");
   $getId=$_POST['remove'];
   $removeklant->bindParam("id", $getId);


   if($removeklant->execute()){
    echo 'delete';
    header("Location: autode.php");
   }else{
     echo 'no';
   }
  
 }
 echo "</table>";
 echo"   <ul class='sq'>
 <li class='bas'><a class='dat' href='autoc.php'>Klant toevoegen</a></li>
</ul>";
//echo "</table>";{
  // echo '<div class="card text-white bg-succes mb-3" style="max-width: 18rem;">
   //<div class="card-header"> - ' .$data['klantid'] . '</div>
   //<div class="card-header">
   //<h5 class="card-title">' . $data['klantnaam'] . '</h5>
   //<p class="card-text">' . $data['klantadres'] . '</p>
  // <p class="card-text">' . $data['klantpostcode'] . '</p>
   //<p class="card-text">' . $data['klantplaats'] . '</p>
   //<form method="POST"> <button claas="btn-btn-danger" type="submit" name="remove" value="'. $data['klantid'] .'">Delete</button></form>
   //</div>
   //</div>';


   //echo "<div>" . $data['klantid'] . "</div>";
   //echo "<div>" . $data['klantnaam'] . "</div>";
   //echo "<div>" . $data['klantadres'] . "</div>";
   //echo "<div>" . $data['klantpostcode'] . "</div>";
   //echo "<div>" . $data['klantplaats'] . "</div>";
   //echo "<from method='POST'><button name='remove' value=' " . $data['klantid'] . " ' type='submit' >";
 ?>
</body>
</html>
