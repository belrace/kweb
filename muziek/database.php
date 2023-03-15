<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet"/>

<style>
	nav{
	background-color:white;

}

	ul {
  opacity: 0.4;
  list-style-type: none;
  margin: 10;
  padding: 10;
  overflow: hidden;
  background-color: #000000;
}

li {
  float: left;
}

li a {
  
  display: block;
  color: white;
  text-align: center;
  padding: 15px 17px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
	<body style="color:white;" bgcolor="000000">
	
<ul>
	
	<li><a  href="homepage.php">Home</a></li> 
	<li><a class="active" href="contact.php">Contact</a></li>
	<li><a class="active" href="database.php">Database</a></li>
	<li><a class="active" href="nieuws.php">Nieuws</a></li>
	
	
</ul>

</head>
<body>
	<form method="POST">
	gebruikers naam: <input name="gebruiker" type="text"/></br>
	wachgtwoord:	<input name="ww" type="password"/></br>
				<input name="btnLogin" type="submit" value="submit"/>
	</form>


</body>
</html>


<?php
require ("config.php");






if(isset($_POST['btnLogin']))
{
	$user = $_POST['gebruiker'];
	$password = $_POST['ww'];

	//stap 1
	$query = "SELECT * FROM login WHERE gebruikersnaam = :user AND wachtwoord = :password ";
	//stap 2 inlezen
	$stm = $conn->prepare($query);
	//stap3 koppelen
	$stm->bindparam(":user", $user);
	$stm->bindparam(":password", $password);
	//stap 4 uitvoeren
	if($stm->execute() == true){
		
		$login = $stm->fetch(PDO::FETCH_OBJ);
		if($login == null) echo "Geen gebruiker met deze gegevens";
		
		else header("Location: overzicht.php");
		
	}
	
	
	
}


?>

