<?php // AUTHENTIFICATION

    require './dbConnect.php';

    //On vas interroger notre base de données afin de savoir si le visiteur qui se connecte est bien membre 
    //On teste si nos variables sont définies
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

    // On vérifie les informations du formulaire => si le pseudo saisi est bien un pseudo autorisé dans la bdd, de même pour le mot de passe
    foreach ($pdo->query('SELECT * FROM user WHERE username = "'.$_POST['login'].'";')as $row){
        if ($row['username'] == $_POST['login'] && $row['password'] == $_POST['pwd']) {

    // Si tout est ok, on peut démarrer notre session :
    session_start ();

    //On enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) 
    	$_SESSION['login'] = $_POST['login'];
    	$_SESSION['pwd'] = $_POST['pwd'];
    // Et on redirige notre visiteur vers une page de notre site
    header ('location: read.php');
    	}
    	else {
    // Le visiteur n'a pas été reconnu comme étant membre de notre site, on le redirige vers la page que l'on veut :
        header('Location: ./login.php');
        } 
    }
} 
?>

<?php
// tuto http://www.lephpfacile.com/cours/18-les-sessions
    //  On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
    // $login_valide = "moi";
    // $pwd_valide = "lemien";

    // // on teste si nos variables sont définies
    // if (isset($_POST['login']) && isset($_POST['pwd'])) {

    // // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    //     if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
    // // dans ce cas, tout est ok, on peut démarrer notre session
    // // on la démarre :)
    // session_start ();
    // //on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
    // 	$_SESSION['login'] = $_POST['login'];
    // 	$_SESSION['pwd'] = $_POST['pwd'];
    // // on redirige notre visiteur vers une page de notre section membre
    // header ('location: read.php');
    // 	}
    // 	else {
    // // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    //     echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // //puis on le redirige vers la page d'accueil
    //     echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
    //     }
    // }
    // else {
    //     echo 'Les variables du formulaire ne sont pas déclarées.';
    //  }
    ?>