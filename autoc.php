<html>
<body>
    

<?php


$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=projectph;",$username,$password);



if(isset($_POST['send'])){
    
   $autokenteken = $_POST['autokenteken'];
   $automerk = $_POST['automerk'];
   $autotype = $_POST['autotype'];
   $autokmstand = $_POST['autokmstand'];
   
$addData =$database->prepare("INSERT INTO autokl(autokenteken,automerk,autotype,autokmstand) 
VALUES('$autokenteken','$automerk','$autotype','$autokmstand')");
$addData->execute();
}



?>

<form method="POST">
    


autokenteken :<input type="text" name="autokenteken" required/>
<br>
automerk :<input type="text" name="automerk" required/>
<br>
autotype:<input type="text" name="autotype" required />
<br>
autokmstand<input type="text" name="autokmstand" required/>
<br>
<button type="submit" name="send">send</button>


</form>


</body>
</html>
