<?php
/**** Supprimer une randonnée ****/
include("./dbConnect.php");

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

 