<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>

<?php require "./dbConnect.php"; ?>

	<a href="./read.php">Liste des Randonnées</a>
	<h1 class="bg-dark text-white text-center display-4">Ajouter une Randonnée</h1>
	<form action="./create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="" required>
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
			<label for="distance">Distance (en km)</label>
			<input type="text" name="distance" value="" required>
		</div>
		<div>
			<label for="duration">Durée (en hh:mm:ss)</label>
			<input type="duration" name="duration" value="" required>
		</div>
		<div>
			<label for="height_difference">Dénivelé (en mètre)</label>
			<input type="text" name="height_difference" value="" required>
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" value="" required>
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

<?php
// Remplissage de la table (ajout des rando)

if(isset($_POST['name']) && isset( $_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference']) && isset($_POST['available'])){
	$name = htmlspecialchars($_POST['name']);
	$difficulty = htmlspecialchars($_POST['difficulty']);
	$distance = ($_POST['distance']);
	$duration = htmlspecialchars($_POST['duration']);
	$height = ($_POST['height_difference']);
	$available = htmlspecialchars($_POST['available']);



	try{

		$liste = $pdo->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) Values('".$name."','".$difficulty."',".$distance.",'".$duration."',".$height.",'".$available."');");
		
		if($liste->execute()){
			echo "La randonnée a été ajoutée avec succès!";
		} else {
			echo "La randonnée n'a pas été ajoutée !";
		}
	}catch (PDOException $e){
		print "Erreur:".$e->getMessage()."<br>";
	}finally{
		header('location: ./read.php');
	}
}
?>
</body>

</html>
