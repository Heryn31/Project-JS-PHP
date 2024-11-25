<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Etudiant</title>
</head>

<body>
  <div class="main">
    <div class="side_left">

    </div>
    <div class="side_right">
      <?php
      include "connexion.php";


      $sql = "SELECT `num_etudiant` FROM `examen` WHERE statut='1'";
      $req = $connexion->query($sql);
      if ($req->rowCount() > 0) {
        $result = $req->fetch();
        $sql_new = "SELECT Nom FROM `etudiant` WHERE num_etudiant='$result[0]'";
        $req = $connexion->query($sql_new);
        if ($req->rowCount() > 0) {
          $result = $req->fetch();
          print "<h3 class=\"titre\">Bienvenue $result[0]</h3>";
        } else {
          print "Error, nom introuvable";
        }
      } else {
        print "Multiple online studenet";
      }

      //recherche de nom de l'etudiant




      ?>
      <div class="main">
        <div class="container">

          <a href="s"><button class="add disable">Passer l'examen</button></a>

          <button class="add">Voir vos informations</button>
        </div>
      </div>
</body>
</div>
</div>
<footer>
  <!-- <p class="footercop">Gestion des questionnaires by Herinantenaina</p> -->
  <!-- <img src="" alt="eni">
    <img src="" alt="uf"> -->
</footer>

</html>