<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Administrateur</title>
</head>

<body>
  <div class="side_left">
    <h3 class="titre">Tableau de bord</h3><br>
    <a href="http://localhost/sujet/main.php" class="deco">🏠Se deconnecter</a>

  </div>
  <div class="side_right">
  <img src="http://localhost/sujet/png/dash.png" alt="img" class="img">
    <div class="main">
        <div class="container">
            <a href="http://localhost/sujet/add/add.php"><button class="add">1:Ajouter un etudiant</button></a>

            <a href="http://localhost/sujet/list/list.php"><button class="add etudiant">2:Voir la liste</button></a>

            <a href="http://localhost/sujet/admin/admin_question.php"><button class="add question">3:Voir les questions</button></a>
        </div>
    </div>
    </div>
</body>

</html>
<!-- <script>

  alert ("Bienvenu");


  function color_change(){
    let bod=document.getElementsByTagName(body);
    let but=document.getElementsByTagName(a);

    bod.style.background_color="black";

  }


</script> -->