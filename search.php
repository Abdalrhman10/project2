<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
</head>

<body id="bodyse">
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);

if(isset($_GET['btn-search'])){
    $SEARCH = $database->prepare("SELECT * FROM autogarage  WHERE klantid LIKE :value OR Klantnaam LIKE :value OR klantadres LIKE :value OR Klantpostcode LIKE :value OR klantplaats LIKE :value");
    $SEARCH_VALUE = "%".$_GET['search']."%";
     
    $SEARCH->bindParam("value" , $SEARCH_VALUE);
    $SEARCH->execute();
    
    foreach($SEARCH AS $se){
        echo '<table class="tableid">';
        echo '<tr class="hooo">';
        echo '<td class="hoo">'  . $se['klantid'] .  '<td>';
        echo '<td class="hoo">' . $se['Klantnaam'] .  '<td>'; 
        echo '<td class="hoo">'  . $se['klantadres'] .  '<td>';
        echo '<td class="hoo">' . $se['Klantpostcode'] .  '<td>';
        echo '<td class="hoo">' . $se['klantplaats'] .  '<td>';
        echo '</tr>';
        echo '</table>';
        
    }
}

?>

<form id="forser" method="GET">
    <input class="searchin" type = "text" name = "search" placeholder = "Search.." />
    <button class="butsear" type="submit" name="btn-search" >SEARCH..</button>
</form>


</body>

</html>