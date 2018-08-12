<?php
/**** Supprimer une randonnée ****/

//authentification
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) {
	header('Location: ./read.php');
}

require("./dbConnect.php");

	$id = $_GET["id"];

	try{
		$delete = $pdo->prepare("DELETE FROM hiking WHERE id =$id");

		$delete->execute();
		print_r($delete);

		if($delete->execute()){
			echo "La randonnée a été supprimée avec succès !";
		} else {
			echo "La randonnée na pas été supprimée !";
		}
	}catch (PDOException $e){
		print "Erreur:".$e->getMessage()."<br>";
	}finally {
		header('location: ./read.php');
	}

?>

 