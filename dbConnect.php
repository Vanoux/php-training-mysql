<?php
//mysqli gearhost
// DEFINE("SERVER", "den1.mysql1.gear.host");
// DEFINE("LOGIN", "reunion1");
// DEFINE("MDP", "Im4oE85_-O7F");
// DEFINE("BASE", "reunion1");
// $connect=mysqli_connect(SERVER,LOGIN,MDP,BASE)or die("pb de connexion au serveur");

//mysqli localhost
// DEFINE("SERVER", "localhost");
// DEFINE("LOGIN", "root");
// DEFINE("MDP", "OLNEJI84");
// DEFINE("BASE", "reunion_island");
// $connect=mysqli_connect(SERVER,LOGIN,MDP,BASE)or die("pb de connexion au serveur");

//$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=reunion1','reunion1','Im4oE85_-O7F');
$pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','OLNEJI84', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>