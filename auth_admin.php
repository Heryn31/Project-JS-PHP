<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth_admin.css">
    <title>Connection</title>
</head>

<body>

    <form method="post">
        <div class="side_left">
            <a href="http://localhost/sujet/main.php" class="return">⬅</a><br>

            <h3 class="titre">Securite🔓</h3><br>
            <div class="container">
                <input type="password" name="pass" class="pass" id="pass" placeholder="Mot de passe" required>
                <input type="checkbox" id="eye">
                <label for="eye"><img src="png/eye.png" alt="eye" class="eye"></label>
            </div>

            <?php
            include "connexion.php";
            if (isset($_POST['valider'])) {
                $pass = $_POST['pass'];

                // $sqlpass = "SELECT * FROM `admin` WHERE `Password`= '$pass'";
                $res = $connexion->query("SELECT * FROM `admin` WHERE `Password`= '$pass'");
                if ($res->rowCount() > 0) {
                    // $mainkey=1;
                    // print "SELECT * FROM `admin` WHERE `Password`= '$pass'";
                    print "<script>alert('Bienvenu admin ...');</script>";
                    header("location: admin/dashboard.php");
                } else {
                    print "<script>alert('Mot de passe incorrect');</script>";
                    // die("Erreur de connexion : " . mysqli_connect_error());
                }
            }
            ?>

            <input type="submit" value="Valider" class="valider" name="valider">
        </div>
    </form>
    <div class="side_right">
        <p class="para">❗Tips: <br>Pour raison de securite, entrer le mot de passe <br></p>
    </div>
    <!-- <a href="" class="valider"><button class="but_valid"></button></a> -->
</body>
<!-- <script>
    function toggle() {
        var pass = document.getElementById("pass");
        var ey = document.getElementById("ey");
        if (pass.display== 'block') {
            elem.style.display = 'none';
        } else {
            elem.style.display = 'block';
        }
    }
</script> -->
<script>
    var pass = document.getElementById('pass');
    var eye = document.getElementById('eye');

    function toogle_pass() {
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }

    }
    eye.addEventListener('change', function() {
        toogle_pass();
    });
</script>

</html>