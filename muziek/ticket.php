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




<?php
require ("config.php");


	//STAP 1 - Query maken
	$query = "SELECT * FROM ticket ORDER BY tid";
	
	//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
	$stm = $conn->prepare($query);
	$stm->execute();
		//Ophalen alle resulaten die uit de SELECT query komen in objectformaat in een array
		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		
		
	echo "<table>"; 
		foreach($res as $pers)
		{
			echo "<tr>";
			echo "<td>".$pers->tid. "</td>";
			
			
			echo "<td>".$pers->ticket."</td>";
			
			echo "<td>".$pers->beschrijving."</td>";
			echo "<tr/>";
			
		}
		
	echo "<table/>";
	




?>



			<form method="POST">

				<input type="text" name="txttid" /> tid (is het nummer in het overzicht) <br/>
				<input type="text" name="txtaantal" /> aantal <br/>
				<input name="txtadress" /> adress </br>
				<input name="txtpostcode" /> postcode </br>
				<input name="txtemailadress" /> e-mailadres </br>
				<input name="txttelefoon" /> telefoonnummer </br>
				<input type="submit" name="btnOpslaan" value="Opslaan"/></br>
				
			
			
			</form>
			
			
			
<?php
require ("config.php");

if(isset($_POST['btnOpslaan'])){
	
	$tid = $_POST['txttid'];
	$aantal = $_POST['txtaantal'];
	$adress = $_POST['txtadress'];
	$postcode = $_POST['txtpostcode'];
	$emailadres = $_POST['txtemailadress'];
	$telefoonnummer = $_POST['txttelefoon'];

	

		//stap1
		$query = "INSERT INTO bestelling (tid, aantal, adress, postcode, emailadres, telefoonnummer ) 
		VALUES ( :tid, :aantal, :adress, :postcode, :emailadres, :telefoonnummer)";
		
		//STAP 2 - Query inlezen en voorbereiden om uitgevoerd te worden
		$stm = $conn->prepare($query);
		
		//STAP 3 - Uitvoeren van de query naar de database
		$stm->bindparam(":tid", $tid);
		$stm->bindparam(":aantal", $aantal);
		$stm->bindparam(":adress", $adress);
		$stm->bindparam(":postcode", $postcode);
		$stm->bindparam(":emailadres", $emailadres);
		$stm->bindparam(":telefoonnummer", $telefoonnummer);
		
		
		//stap4
		//$stm = $conn->prepare($query);
			if($stm->execute() == true)
			{
				echo "Statment correct uitgevoerd!";
				
			}else echo "Query mislukt!";
	
		
		
	}



?>
			
			
			
			