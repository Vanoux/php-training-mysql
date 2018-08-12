<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <?php require "./dbConnect.php";?>
  <?php
      //test requete
      // try {
      //   foreach($pdo->query('SELECT * FROM hiking') as $row){
      //     print_r($row);
      //   }
      //   $pdo = null;
      // } catch (PDOException $e){
      //   print "Erreur! : " . $e->getMessage() . "<br>";
      //   die();
      // }
      ?>

    <!-- Afficher et ajouter la liste des randonnées  -->
    <h1 class="bg-dark text-white text-center display-3">Liste des randonnées</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link text-success" href="./create.php">Ajouter une Randonnée</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-dark">Pour Modifier ou Supprimer une randonnée, cliquez dessus</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-danger" href="./login.php">S'authentifier</a>
          </li>
        </ul>
      </div>
    </nav>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">NAME</th>
          <th scope="col">DIFFICULTY</th>
          <th scope="col">DISTANCE</th>
          <th scope="col">DURATION</th>
          <th scope="col">HEIGHT_DIFFERENCE</th>
          <th scope="col">AVAILABLE</th>

        </tr>
      </thead>

      <tbody>
        <?php
        foreach($pdo->query('SELECT * FROM hiking') as $row){
        echo '<tr>';
        echo '<th scope="row">'.$row["id"].'</th>';
        echo '<td><a href="update.php?id='.$row["id"].'">'.$row["name"].'</a></td>';
        echo '<td>'.$row["difficulty"].'</td>';
        echo '<td>'.$row["distance"].'</td>';
        echo '<td>'.$row["duration"].'</td>';
        echo '<td>'.$row["height_difference"].'</td>';
        echo '<td>'.$row["available"].'</td>';

        echo '</tr>';
        }
        ?>

      </tbody>
    </table>

</body>

</html>