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

<?php
	require("config.php");
	//Controleren of er een verblijfsnaam is en een bepaalde actie in de variabele action
	if(isset($_GET['nid']) && isset($_GET['action']))
	{
		
		
		$artikelid = $_GET['nid'];
		//Is de waarde van action wijzig, dan het wijzigingsformulier opbouwen
		if($_GET['action'] == "wijzig")
		{
		
		//STAP 1 - Query schrijven
		$query = "SELECT * FROM nieuws WHERE nid = $artikelid";

		//STAP 2 - QUery uitlezen en voorbereiden om uitgevoerd te worden.
		$stm = $conn->prepare($query);
		//STAP 3 - Uitvoeren query naar de database
		if($stm->execute() == true)
		{
			//STAP 4 - Ophalen resultaat met fetch()
			$artikelid = $stm->fetch(PDO::FETCH_OBJ);
			
		
		
		
		
	
		?>	
		
			<form method="POST">
				<input readonly type="text" name="txtnid" value="<?php echo $artikelid->nid;  ?>"/> nid <br/>
				<input type="text" name="txtartikelnaam" value="<?php echo $artikelid->artikelnaam;  ?>"/> artikelnaam <br/>
				artikel</br>
				<textarea name="txtartikel"><?php echo $artikelid->artikel;  ?></textarea></br>
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
	
	$nid = $_POST['txtnid'];
	$artikelnaam = $_POST['txtartikelnaam'];
	$artikel = $_POST['txtartikel'];
	
	//Datum is altijd met '' erom heen.
	//STAP1 - Query schrijven
	$query = "UPDATE nieuws SET  artikelnaam = '$artikelnaam', artikel = '$artikel' WHERE nid = $nid";
	
	//STAP 2 - Uitlezen query
	$stm = $conn->prepare($query);
	
	//STAP 3 - Query uitvoeren op de database
	if($stm->execute() == true)
	{
		echo "Update gelukt!";
		Header("Location: overzicht.php");
		
	}else {echo "OEPS!!";}
}


