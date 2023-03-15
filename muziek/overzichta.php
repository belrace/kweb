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
	
	<<li><a  href="homepage.php">Home</a></li> 
	<li><a class="active" href="contact.php">Contact</a></li>
	<li><a class="active" href="database.php">Database</a></li>
	<li><a class="active" href="nieuws.php">Nieuws</a></li>
	<li><a class="äctive" href="ticket.php">Ticket</a></li>
	
	
</ul>

<?php
	require("config.php");
	//Controleren of er een verblijfsnaam is en een bepaalde actie in de variabele action
	if(isset($_GET['aid']) && isset($_GET['action']))
	{
		
		
		$artiestid = $_GET['aid'];
		//Is de waarde van action wijzig, dan het wijzigingsformulier opbouwen
		if($_GET['action'] == "wijzig")
		{
		
		//STAP 1 - Query schrijven
		$query = "SELECT * FROM artiest WHERE aid = $artiestid";

		//STAP 2 - QUery uitlezen en voorbereiden om uitgevoerd te worden.
		$stm = $conn->prepare($query);
		//STAP 3 - Uitvoeren query naar de database
		if($stm->execute() == true)
		{
			//STAP 4 - Ophalen resultaat met fetch()
			$artiestid = $stm->fetch(PDO::FETCH_OBJ);
			
		
		
		
		
	
		?>	
		
			<form method="POST">
				<input readonly type="text" name="txtaid" value="<?php echo $artiestid->aid;  ?>"/> aid <br/>
				<input type="text" name="txtartiestnaam" value="<?php echo $artiestid->artiestnaam;  ?>"/> artiestnaam <br/>
				<input type="text" name="txtlink" value="<?php echo $artiestid->link;  ?>"/> link <br/>
				
				<input type="submit" name="btnWijzig" value="Wijzig"/></br>
				
			
			
			</form>
			
			
			
		<?php	
		}
		
		
		
		//Als de action verwijder is, dan een verwijderpagina opbouwen
		}else if($_GET['action'] == 'verwijder')
			{
				echo "Welkom op de verwijderpagina!";
			//Verwijzing naar de delete pagina
		}	{ echo "";}
	}

if(isset($_POST['btnWijzig'])){
	
	$aid = $_POST['txtaid'];
	$artiestnaam = $_POST['txtartiestnaam'];
	$link = $_POST['txtlink'];
	
	//Datum is altijd met '' erom heen.
	//STAP1 - Query schrijven
	$query = "UPDATE artiest SET  artiestnaam = '$artiestnaam', link = '$link' WHERE aid = $aid";
	
	//STAP 2 - Uitlezen query
	$stm = $conn->prepare($query);
	
	//STAP 3 - Query uitvoeren op de database
	if($stm->execute() == true)
	{
		echo "Update gelukt!";
		Header("Location: overzicht.php");
		
	}else {echo "OEPS!!";}
}


