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
	<li><a class="active" href="ticket.php">Ticket</a></li>
	
</ul>

</head>
<body>
<h1>Line up</h1>

</body>
</html>


<?php
require ("config.php");



	//STAP 1 - Query maken
	$query = "SELECT * FROM artiest ORDER BY artiestnaam";
	
	//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
	$stm = $conn->prepare($query);
	
	if($stm->execute() == true){
		
		//Ophalen alle resulaten die uit de SELECT query komen in objectformaat in een array
		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		//Door de resultaten heen lopen
		foreach($res as $pers)
		{
			//Bepaalde data op het scherm tonen
			echo "<a href=$pers->link>".$pers->artiestnaam."</a><br/>";
		}
		
		//Is het mogelijk om 'ontheflywijzigv.php' kan veranderen in link van uit de database. 
		
	}

?>