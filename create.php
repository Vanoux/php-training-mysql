<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
	<?php
      require "./dbConnect.php";
      ?>

	<a href="./read.php">Liste des données</a>
	<h1>Ajouter une Randonnée</h1>
	<form action="./create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

<?php
// Remplissage de la table (ajout des rando)

if(isset($_POST['name']) && isset( $_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])){
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = $_POST['duration'];
	$height = $_POST['height_difference'];


	try{

		$liste = $pdo->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) Values('".$name."','".$difficulty."',".$distance.",'".$duration."',".$height.')' );
		
		if($liste->execute()){
			echo "La randonnée a été ajoutée avec succès!";
		} else {
			echo "La randonnée n'a pas été ajoutée !";
		}
	}catch (PDOException $e){
		print "Erreur:".$e->getMessage()."<br>";
	}
	echo $liste;
	


}

 

?>
</body>

</html>
