<?php

    if(!isset($_GET["idKnjige"])){
        return false;
    }

    extract($_GET);

    $db = mysqli_connect("localhost", "root", "", "pva_k2_g2");

    $upit = "DELETE FROM `knjige` WHERE id = $idKnjige";
    $rez = mysqli_query($db, $upit);

    mysqli_close($db);
?>