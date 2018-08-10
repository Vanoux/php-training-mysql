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

      <!-- Afficher la liste des randonnées -->
      <h1 class="bg-dark text-white text-center display-3">Liste des randonnées</h1>
      
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">NAME</th>
            <th scope="col">DIFFICULTY</th>
            <th scope="col">DISTANCE</th>
            <th scope="col">DURATION</th>
            <th scope="col">HEIGHT_DIFFERENCE</th>
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
        echo '</tr>';
          }
        ?>

      </tbody>
    </table>

</body>

</html>