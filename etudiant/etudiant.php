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
      } else {
        print "Multiple online studenet";
      }

      //recherche de nom de l'etudiant

      $sql_new = "SELECT Nom FROM `etudiant` WHERE num_etudiant='$result[0]'";
      $req = $connexion->query($sql_new);
      if ($req->rowCount() > 0) {
        $result = $req->fetch();
        $sql="SELECT * FROM etudiant WHERE statut='1'";
        $req=$connexion->query($sql);
        $b_name=$req->fetch();
        $name=$b_name['Prenom'];
        print "<h3 class=\"titre\">Bienvenue  $name $result[0]</h3>";
      } else {
        print "";
      }


      ?>



      <div class="main">
        <div class="container">
          <?php
          //recherche de l'etudiant 

          $sql = "SELECT note FROM `examen` WHERE statut='1'";
          $req = $connexion->query($sql);
          $result_notes = $req->fetch();
          if ($result_notes[0] == -1) {
          ?>
            <a href="http://localhost/sujet/question/question.php"><button class="add">Passer l'examen</button></a>
          <?php
          } else {
          ?>
            <a href="#"><button class="nonAdd">Examen fini</button></a>
            <a href="http://localhost/sujet/etudiant/resultat.php"><button class="add">Voir le resultat</button></a>


          <?php

          }
          ?>

          <!-- <button class="add disable">Voir vos informations</button> -->
          <form method="get">

            <input type="submit" value="Se deconnecter" class="sedonnecter" name="deconex">

          </form>
        </div>
      </div>
</body>
</div>
</div>
<footer>
  <!-- <p class="footercop">Gestion des questionnaires by Herinantenaina et Eloi</p> -->
  <!-- <img src="" alt="eni">
    <img src="" alt="uf"> -->
</footer>

</html>
<?php

if (isset($_GET['deconex'])) {
  $sql = "UPDATE examen SET statut='0' WHERE statut='1'";
  $req0 = $connexion->query($sql);
  $sql = "UPDATE etudiant SET statut='0' WHERE statut='1'";
  $req1 = $connexion->query($sql);


  if ($req0->rowCount()>0 and $req1->rowCount()>0){
    header("location:http://localhost/sujet/etudiant/login_etudiant.php");
  }else{
    print "Erreur lors de l'initialisation";
  }
  // if ($req0->rowCount() > 0) {
  //   header("location:http://localhost/sujet/etudiant/login_etudiant.php");
  // } else {
  //   print "Update error ";
  // }
}

?>