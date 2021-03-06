<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<?php // Verifie que l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) {
	header('Location: ./read.php');
}
?>

<?php
require("./dbConnect.php");

//Récupération de la rando choisie = en prérempli dans le formulaire
$id = $_GET["id"];
foreach($pdo->query('SELECT * FROM hiking WHERE id='.$id) as $row){
	$name = $row['name'];
	$difficulty = $row['difficulty'];
	$distance = $row['distance'];
	$duration = $row['duration'];
	$height = $row['height_difference'];
	$available = $row['available'];
}
?>

	<a href="/read.php">Liste des données</a>
	<h1 class="bg-dark text-white text-center display-4">Modifier ou Supprimer la Randonnée</h1>
	<form action="/update.php?id=<?php echo $id ?>" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name ?>" required>
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
			<label for="distance">Distance (en km)</label>
			<input type="text" name="distance" value="<?php echo $distance ?>" required>
		</div>
		<div>
			<label for="duration">Durée (en hh:mm:ss)</label>
			<input type="duration" name="duration" value="<?php echo $duration ?>" required>
		</div>
		<div>
			<label for="height_difference">Dénivelé (en mètre)</label>
			<input type="text" name="height_difference" value="<?php echo $height ?>" required>
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" value="<?php echo $available ?>" required>
		</div>
		<button type="submit" name="button">Envoyer</button>

		<a type="button" name="button" href="./delete.php?id=<?php echo $id ?>" >Supprimer</a>

	</form>

<?php // modification d'une randonnée dans la bdd

include("./dbConnect.php");

if(isset($_POST['name']) && isset( $_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference']) && isset($_POST['available'])){
	
	$name = htmlspecialchars($_POST['name']);
	$difficulty = htmlspecialchars($_POST['difficulty']);
	$distance = ($_POST['distance']);
	$duration = htmlspecialchars($_POST['duration']);
	$height = ($_POST['height_difference']);
    $available = htmlspecialchars($_POST['available']);

	try{
		
		$update = $pdo->prepare('UPDATE hiking SET name = "'.$name.'", difficulty = "'.$difficulty.'", distance = "'.$distance.'", duration = "'.$duration.'", height_difference = "'.$height.'", available = "'.$available.'" WHERE id = '.$id.'; ');
		
		$update->execute();
		//print_r($update);

		
		if($update->execute()){
			echo "La randonnée a été modifiée avec succès !";
		} else {
			echo "La randonnée na pas été modifiée !";
		}
	}catch (PDOException $e){
		print "Erreur:".$e->getMessage()."<br>";
	} finally{
		header('location: ./read.php');
	}	
} 
?>
 
</body>
</html>
