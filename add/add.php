<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Ajouter un etudiant</title>
</head>

<body>

    <form method="post">
        <div class="side_left">
            <h3 class="titre">Entrer les informations de l'etudiant</h3>
        </div>
        <div class="side_right">
            <input type="text" name="numero" id="numero" placeholder="Numero" class="info" required autocomplete="off"><br><br>
            <input type="text" name="nom" id="nom" placeholder="Nom" class="info" required autocomplete="off"><br><br>
            <input type="text" name="Prenom" id="Prenom" placeholder="Prenom" class="info" required autocomplete="off"><br><br>
            <input type="text" name="email" id="email" placeholder="Email:exemple@gmail.com" class="info" required autocomplete="off"><br><br>

            <select name="level" class="level">
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <br><br>

            <input type="reset" value="Reset" class="reset go">
            <input type="submit" value="✔alider" class="valider go" name="valider">
            <p class="img">👨‍🎓</p>

        </div>
    </form>
    <div class="menu">
        <p class="mtitle">Menu</p>
        <a href="http://localhost/sujet/list/list.php" class="return"><button class="return_but">Voir la liste</button></a>
    </div>


</body>
<?php
include "connexion.php";
if (isset($_POST['valider'])) {
    $num = $_POST['numero'];
    $name = $_POST['nom'];
    $fname = $_POST['Prenom'];
    $level = $_POST['level'];
    $email = $_POST['email'];

    $res = $connexion->query("SELECT * FROM `etudiant` WHERE `num_etudiant`= '$num'");
    // $res_email = $connexion->query("SELECT * FROM `etudiant` WHERE `adr_email`= '$email'");
    if ($res->rowCount() == 0) {
        $sql = "INSERT INTO `etudiant`(`num_etudiant`, `Nom`, `Prenom`, `Niveau`, `adr_email`) VALUES ('$num','$name','$fname','$level','$email')";
        $req = $connexion->query($sql);
        header("location:http://localhost/sujet/list/list.php");
    } else {
        print '<script>alert("Le numero saisi est deja inscrit");</script>';
    }
}
?>

</html>