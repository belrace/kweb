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
<h1> It is time for the news! </h1>
<h2> Vrijdag 28 Mei en Zondag 30 mei 2021 houd</br>
Vakantiepark Amerijck Een muziek festival voor . </br> </h2>

<?php
require ("config.php");


	//STAP 1 - Query maken
	$query = "SELECT * FROM nieuws ORDER BY artikelnaam";
	
	//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
	$stm = $conn->prepare($query);
	$stm->execute();
		//Ophalen alle resulaten die uit de SELECT query komen in objectformaat in een array
		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		
		
	
		foreach($res as $pers)
		{
			echo "<h2>".$pers->artikelnaam."<br/>";
			echo $pers->artikel."<br/>";
			
		}
	
	




?>


</body>
</html>


