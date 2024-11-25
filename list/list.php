    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Listes des etudiants</title>
    </head>

    <body>
        <div class="main_block">



            <div class="side_left">
                <form method="get" class="main_search">
                    <input type="text" name="recherche" class="recherche" autocomplete="off" placeholder="🔍Recherche">
                    <select name="type" class="level">
                        <option value="name">Nom</option>
                        <option value="num">Numero</option>
                    </select>
                </form>
                <form method="get" class="filtre">
                    <select name="level" class="level">
                        <option value="all">Afficher tout</option>
                        <option value="L1">L1</option>
                        <option value="L2">L2</option>
                        <option value="L3">L3</option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>
                    </select>
                    <input type="submit" value="Filtre" name="filtre" class="Afficher">
                </form>
                <div class="nav">
                    <h3 class="nav_menu">Menu</h3>
                    <a href="http://localhost/sujet/admin/dashboard.php"><button class="menu">Menu Principal</button></a>
                    <a href="http://localhost/sujet/add/add.php"><button class="menu">Ajouter</button></a>

                </div>
            </div>

            <!-- Recherche de l'etudiant dans le base de donnees -->










            <div class="side_right">
                <table class="maintable">
                    <tr class="first_table">

                        <td class="table id"></td>
                        <td class="table numero">Numero</td>
                        <td class="table nom">Nom</td>
                        <td class="table">Prenom</td>
                        <td class="table">Niveau</td>
                        <td class="table">Adresse Email</td>
                        <td class="table">Note</td>
                        <td class="table">Merite</td>
                        <td class="table">Action</td>



                    </tr>
                    <?php

                    include "connexion.php";

                    //RECHERCHE DE L'ETUDIANT

                    if (isset($_GET['recherche']) and !empty($_GET['recherche'])) {
                        $recherche = $_GET['recherche'];

                        $search_counter = 0;
                        $use;
                        $search_type = $_GET['type'];
                        // print "$search_type";
                        if ($search_type == 'name') {
                            $sql_query = 'SELECT * FROM `etudiant` WHERE `Nom` LIKE "%' . $recherche . '%"';
                            $sql_recherche = $connexion->query($sql_query);
                            // $sql_recherche_num = $connexion->query('SELECT * FROM `etudiant` WHERE `num_etudiant LIKE "%' . $recherche . '%"');
                            if ($sql_recherche->rowCount() > 0) {
                                while ($use = $sql_recherche->fetch()) {
                                    $search_counter += 1;
                    ?>

                                    <tr>
                                        <td class="table result id"><?= $use['id'] ?></td>
                                        <td class="table result"><?= $use['num_etudiant'] ?></td>
                                        <td class="table result"><?= $use['Nom'] ?></td>
                                        <td class="table result"><?= $use['Prenom'] ?></td>
                                        <td class="table result"><?= $use['Niveau'] ?></td>
                                        <td class="table result"><?= $use['adr_email'] ?></td>
                                        <td class="table result"><?= $use['note'] ?></td>
                                        <td class="table result"><?= $use['Merite'] ?></td>
                                        <td class="table action result">

                                            <a href="http://localhost/sujet/list/update_list.php?update_id=<?= $use['id'] ?>"><button class="modifier" name="modifier">Modifier</button></a>
                                            <a href="http://localhost/sujet/list/delete_list.php?delete_id=<?= $use['id'] ?>"><button class="supprimer">Supprimer</button></a>
                                        </td>
                                    </tr>


                                <?php
                                    $numero_etudiant = $use['num_etudiant'];
                                    $note_etudiant = $use['note'];

                                    switch ($use['note']) {
                                        case 5:
                                            $merite = 'Passable';
                                            break;
                                        case 6:
                                            $merite = 'Assez B';
                                            break;
                                        case 7:
                                            $merite = 'Bien';
                                            break;
                                        case 8:
                                            $merite = 'Tres bien';
                                            break;
                                        case 9:
                                            $merite = 'Excellent';
                                            break;
                                        case 10:
                                            $merite = 'Honnorable';
                                            break;
                                        default:
                                            $merite = 'Insuffisant';
                                    }
                                    $sql = "UPDATE etudiant SET Merite='$merite' WHERE num_etudiant='$numero_etudiant'";
                                    $req = $connexion->query($sql);
                                }
                                ?>
                                <tr class="table">
                                    <td class="result"><?= $search_counter ?> Resultat(s) trouvee</td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr class="table">
                                    <td class="result"><?= $search_counter ?> Resultat(s) trouvee</td>
                                </tr>
                                <?php
                            }
                        } else {
                            $sql_query = 'SELECT * FROM `etudiant` WHERE `num_etudiant` LIKE "%' . $recherche . '%"';
                            $sql_recherche = $connexion->query($sql_query);
                            // $sql_recherche_num = $connexion->query('SELECT * FROM `etudiant` WHERE `num_etudiant LIKE "%' . $recherche . '%"');
                            if ($sql_recherche->rowCount() > 0) {
                                while ($use = $sql_recherche->fetch()) {
                                    $search_counter += 1;
                                ?>

                                    <tr>
                                        <td class="table result id"><?= $use['id'] ?></td>
                                        <td class="table result"><?= $use['num_etudiant'] ?></td>
                                        <td class="table result"><?= $use['Nom'] ?></td>
                                        <td class="table result"><?= $use['Prenom'] ?></td>
                                        <td class="table result"><?= $use['Niveau'] ?></td>
                                        <td class="table result"><?= $use['adr_email'] ?></td>
                                        <td class="table result"><?= $use['note'] ?></td>
                                        <td class="table result"><?= $use['Merite'] ?></td>
                                        <td class="table action result">

                                            <a href="http://localhost/sujet/list/update_list.php?update_id=<?= $use['id'] ?>"><button class="modifier" name="modifier">Modifier</button></a>
                                            <a href="http://localhost/sujet/list/delete_list.php?delete_id=<?= $use['id'] ?>"><button class="supprimer">Supprimer</button></a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                                <tr class="table">
                                    <td class="result"><?= $search_counter ?> Resultat(s) trouvee</td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr class="table">
                                    <td class="result"><?= $search_counter ?> Resultat(s) trouvee</td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                    <?php

                    //FILTRAGE DE L'ETUDIANT 


                    if (isset($_GET['filtre'])) {
                        $level = $_GET['level'];
                        $sql = "SELECT * FROM `etudiant` WHERE `Niveau`= '$level' ORDER BY `Note` DESC";
                        $req = $connexion->query($sql);
                        if ($req->rowCount() > 0) {
                            while ($use = $req->fetch()) {
                    ?>

                                <tr>
                                    <td class="table result id"><?= $use['id'] ?></td>
                                    <td class="table result"><?= $use['num_etudiant'] ?></td>
                                    <td class="table result"><?= $use['Nom'] ?></td>
                                    <td class="table result"><?= $use['Prenom'] ?></td>
                                    <td class="table result"><?= $use['Niveau'] ?></td>
                                    <td class="table result"><?= $use['adr_email'] ?></td>
                                    <td class="table result"><?= $use['note'] ?></td>
                                    <td class="table result"><?= $use['Merite'] ?></td>
                                    <td class="table action result">

                                        <a href="http://localhost/sujet/list/update_list.php?update_id=<?= $use['id'] ?>"><button class="modifier" name="modifier">Modifier</button></a>

                                        <a href="http://localhost/sujet/list/delete_list.php?delete_id=<?= $use['id'] ?>"><button class="supprimer">Supprimer</button></a>
                                    </td>
                                </tr>

                            <?php
                            } ?>
                            <tr class="table">
                                <td class="result">Tout les etudiants <?= $level ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                    <?php

                    //AFFICHAGE DE L'EFFECTIF


                    $counter = 0;
                    $L1 = 0;
                    $L2 = 0;
                    $L3 = 0;
                    $M1 = 0;
                    $M2 = 0;

                    //AFFICHAGE NORMAL:

                    $sql = "SELECT * FROM `etudiant` ORDER BY `note` DESC";
                    $req = $connexion->query($sql);
                    while ($use = $req->fetch()) {
                    ?>
                        <tr>
                            <td class="table id"><?= $use['id'] ?></td>
                            <td class="table numero"><?= $use['num_etudiant'] ?></td>
                            <td class="table nom"><?= $use['Nom'] ?></td>
                            <td class="table prenom"><?= $use['Prenom'] ?></td>
                            <td class="table niveau"><?= $use['Niveau'] ?></td>
                            <td class="table email"><?= $use['adr_email'] ?></td>
                            <td class="table note"><?= $use['note'] ?></td>
                            <td class="table merite"><?= $use['Merite'] ?></td>
                            <td class="table action">
                                <a href="http://localhost/sujet/list/update_list.php?update_id=<?= $use['id'] ?>"><button class="modifier" name="modifier">Modifier</button></a>

                                <a href="http://localhost/sujet/list/delete_list.php?delete_id=<?= $use['id'] ?>"><button class="supprimer" name="supprimer">Supprimer</button></a>
                            </td>
                        </tr>


                    <?php
                        $counter += 1;
                        if ($use['Niveau'] == 'L1') {
                            $L1 += 1;
                        } elseif ($use['Niveau'] == 'L2') {
                            $L2 += 1;
                        } elseif ($use['Niveau'] == 'L3') {
                            $L3 += 1;
                        } elseif ($use['Niveau'] == 'M1') {
                            $M1 += 1;
                        } else {
                            $M2 += 1;
                        }
                        // $numero_etudiant = $use['num_etudiant'];
                        // $note_etudiant = $use['note'];

                        // switch ($use['note']) {
                        //     case 5:
                        //         $merite = 'Passable';
                        //         break;
                        //     case 6:
                        //         $merite = 'Assez B';
                        //         break;
                        //     case 7:
                        //         $merite = 'Bien';
                        //         break;
                        //     case 8:
                        //         $merite = 'Tres bien';
                        //         break;
                        //     case 9:
                        //         $merite = 'Excellent';
                        //         break;
                        //     case 10:
                        //         $merite = 'Honnorable';
                        //         break;
                        //     default:
                        //         $merite = 'Insuffisant';
                        // }
                        // $sql = "UPDATE etudiant SET Merite='$merite' WHERE num_etudiant='$numero_etudiant'";
                        // $req = $connexion->query($sql);
                    }
                    $sql = "SELECT * FROM `etudiant`";
                    $request = $connexion->query($sql);
                    $i = 0;
                    while ($use = $request->fetch()) {
                        $note_etudiant = $use['note'];

                        switch ($use['note']) {
                            case 5:
                                $merite = 'Passable';
                                break;
                            case 6:
                                $merite = 'Assez Bien';
                                break;
                            case 7:
                                $merite = 'Bien';
                                break;
                            case 8:
                                $merite = 'Tres bien';
                                break;
                            case 9:
                                $merite = 'Excellent';
                                break;
                            case 10:
                                $merite = 'Honnorable';
                                break;
                            default:
                                $merite = 'Insuffisant';
                        }
                        $sql = "UPDATE `etudiant` SET Merite='$merite' WHERE note='$note_etudiant'";
                        $req = $connexion->query($sql);
                        $i++;
                    }

                    print "<div class=\"totalmain\">
            <p class=\"total\">Total: $counter Etudiants</p>
            <p class=\"total\">L1: $L1 Etudiants</p>
            <p class=\"total\">L2: $L2 Etudiants</p>
            <p class=\"total\">L3: $L3 Etudiants</p>
            <p class=\"total\">M1: $M1 Etudiants</p>
            <p class=\"total\">M2: $M2 Etudiants</p>
        </div>";
                    //MERITE DE L'ETUDIANT



                    ?>


                </table>
            </div>
        </div>


    </body>

    </html>