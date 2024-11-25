<?php

    include "connexion.php";
    $id=$_GET['delete_id'];
    $sql="DELETE FROM `qcm` WHERE num_question='$id'";
    $req=$connexion->query($sql);
    if ($req){
        header("location:http://localhost/sujet/admin/admin_question.php");
    }

?>