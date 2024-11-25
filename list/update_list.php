<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/sujet/add/add.css">
    <title>Ajouter un etudiant</title>
</head>

<body>

    <form method="post">
        <div class="side_left">
            <h3 class="titre">Modifier les informations de l'etudiant</h3>
        </div>
        <?php
        include "connexion.php";
        $id = $_GET['update_id'];
        $sql = "SELECT * FROM `etudiant` WHERE id='$id'";
        $req = $connexion->query($sql);

        if ($req->rowCount() > 0) {
            while ($use = $req->fetch()) {
                $num = $use['num_etudiant'];
                // print "<script>alert('$num')</script>";
                $name = $use['Nom'];
                $fname = $use['Prenom'];
                $level = $use['Niveau'];
                $email = $use['adr_email'];
            }
        }
        ?>
        <div class="side_right">
            <input type="text" name="numero" id="numero" placeholder="Numero" class="info" required autocomplete="off" value="<?= $num ?>"><br><br>
            <input type="text" name="nom" id="nom" placeholder="Nom" class="info" required autocomplete="off" value="<?= $name ?>"><br><br>
            <input type="text" name="Prenom" id="Prenom" placeholder="Prenom" class="info" required autocomplete="off" value="<?= $fname ?>"><br><br>
            <input type="text" name="email" id="email" placeholder="Email:exemple@gmail.com" class="info" required autocomplete="off" value="<?= $email ?>"><br><br>

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
    <?php
    if (isset($_POST['valider'])) {
        $num = $_POST['numero'];
        $name = $_POST['nom'];
        $fname = $_POST['Prenom'];
        $level = $_POST['level'];
        $email = $_POST['email'];

        //MISE A JOUR DE LA TABLE EXAMEN
        $req0 = $connexion->query("SELECT * FROM etudiant WHERE id='$id'");
        $pnum = $req0->fetch();
        $ppnum = $pnum['num_etudiant'];

        if ($req0->rowCount() > 0) {
            $sql = "UPDATE examen SET num_etudiant='$num' WHERE num_etudiant='$ppnum'";
            $req = $connexion->query($sql);
            if ($req->rowCount() > 0) {
                print "<script> alert ('Mise a jour dans la table examen eff'); </script>";
            } else {
                print "<script> alert ('$ppnum '); </script>";
            }
        }

        $sql = "UPDATE `etudiant` SET id='$id',num_etudiant='$num',Nom='$name', Prenom='$fname',Niveau='$level',adr_email='$email' WHERE `id`=$id";
        $req = $connexion->query($sql);

        if ($req->rowCount()>0) {
            header("location:http://localhost/sujet/list/list.php");
        } else {
            print "<script> alert ('Re-verifier les information'); </script>";
        }
    }
    ?>
    <div class="menu">
        <p class="mtitle">Menu</p>
        <a href="http://localhost/sujet/list/list.php" class="return"><button class="return_but">Voir la liste</button></a>
    </div>


</body>

</html>