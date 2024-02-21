<?php
    if(!isset($_POST["autor"])){
        return false;
    }

    extract($_POST);
    session_start();

    $idPrijavljen = $_SESSION["id"];
    $email = $_SESSION["email"];

    $db = mysqli_connect("localhost", "root", "", "pva_k2_g2");

    $upit = "insert into knjige(idKorisnika, naslov, autor, brojStranica) values($idPrijavljen, '$naslov', '$autor', $brStrana);";
    $rez = mysqli_query($db, $upit);

    // Logovanje dodavanja knjige
    $datum = date_create();
    $datumString = $datum->format("Y-m-d");
    $datumVreme = $datum->format("H:i:s");

    $nazivFajla = $datumString . "_log.txt";

    $file = fopen("../logovi/".$nazivFajla, "a");

    $upis = "$datumVreme - Dodavanje nove knjige '$naslov' od strane korisnika '$email'\n";
    fwrite($file, $upis);

    fclose($file);

    mysqli_close($db);
?>