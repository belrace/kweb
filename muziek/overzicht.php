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
	<li><a class="äctive" href="ticket.php">Ticket</a></li>
	
	
</ul>

<h1>Artiesten</h1></br>

<?php

	require("config.php");
	
	
	
	
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
			echo "<a href=overzichta.php?aid=$pers->aid&action=wijzig>".$pers->artiestnaam."</a><br/>";
		}
		
		
	}
		?>
		
		
		
		
		
		
<h1> Nieuws items </h1></br>




<?php

	//STAP 1 - Query maken
	$query = "SELECT * FROM nieuws ORDER BY artikelnaam";
	
	//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
	$stm = $conn->prepare($query);
	
	if($stm->execute() == true){
		
		//Ophalen alle resulaten die uit de SELECT query komen in objectformaat in een array
		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		//Door de resultaten heen lopen
		foreach($res as $pers)
		{
			//Bepaalde data op het scherm tonen
			echo "<a href=overzichtn.php?nid=$pers->nid&action=wijzig>".$pers->artikelnaam."</a><br/>";
		}
		
		
	}





?>


<h1> Insert artiest </h1></br>


			<form method="POST">
			
				<input type="text" name="txtartiestnaam"/> artiestnaam <br/>
				<input type="text" name="txtlink"> link <br/>
				
				<input type="submit" name="btnOpslaan" value="Opslaan"/></br>
			
			</form>


<?php

if(isset($_POST['btnOpslaan']))
	{
		$artiestnaam = $_POST['txtartiestnaam'];
		$link = $_POST['txtlink'];
	

		
		//stap1
		$query = "INSERT INTO artiest (artiestnaam, link) VALUES ( :artiestnaam, :link )";
		
		//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
		$stm = $conn->prepare($query);
		
		//STAP 3 - Uitvoeren van de query naar de database
		$stm->bindparam(":artiestnaam", $artiestnaam);
		$stm->bindparam(":link", $link);
		
		//stap4
		//$stm = $conn->prepare($query);
			if($stm->execute() == true)
			{
				echo "Statment correct uitgevoerd!";
				
			}else echo "Query mislukt!";
	
		
		
	}




?>

<h1> Insert Nieuws artikel </h1>

			<form method="POST">
			
				<input type="text" name="txtartikelnaam"/> artikelnaam <br/>
				artikel</br>
				<textarea name="txtartikel"></textarea></br>
				
				<input type="submit" name="btnOpslaanN" value="Opslaan"/></br>
			
			</form>


<?php

if(isset($_POST['btnOpslaanN']))
	{
		$artikelnaam = $_POST['txtartikelnaam'];
		$artikel = $_POST['txtartikel'];
	

		
		//stap1
		$query = "INSERT INTO nieuws (artikelnaam, artikel) VALUES ( :artikelnaam, :artikel )";
		
		//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
		$stm = $conn->prepare($query);
		
		//STAP 3 - Uitvoeren van de query naar de database
		$stm->bindparam(":artikelnaam", $artikelnaam);
		$stm->bindparam(":artikel", $artikel);
		
		//stap4
		//$stm = $conn->prepare($query);
			if($stm->execute() == true)
			{
				echo "Statment correct uitgevoerd!";
				
			}else echo "Query mislukt!";
	
		
		
	}




?>
