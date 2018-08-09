<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<?php
include("./dbConnect.php");

$id = $_GET["id"];
foreach($pdo->query('SELECT * FROM hiking WHERE id='.$id) as $row){
	$name = $row['name'];
	$difficulty = $row['difficulty'];
	$distance = $row['distance'];
	$duration = $row['duration'];
	$height = $row['height_difference'];
}
?>

	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="/update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if($difficulty == "très facile"){ ?> selected <?php } ?> >Très facile</option>
				<option value="facile" <?php if($difficulty == "facile"){ ?> selected <?php } ?> >Facile</option>
				<option value="moyen" <?php if($difficulty == "moyen"){ ?> selected <?php } ?> >Moyen</option>
				<option value="difficile" <?php if($difficulty == "difficile"){ ?> selected <?php } ?> >Difficile</option>
				<option value="très difficile" <?php if($difficulty == "très difficile"){ ?> selected <?php } ?> >Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $duration ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
