<?php
    if(!isset($_POST["email"])){
        return false;
    }

    extract($_POST);

    // Baza
    $db = mysqli_connect("localhost", "root", "", "pva_k2_g2");

    $upit = "SELECT * FROM `korisnici` WHERE email = '$email' and lozinka = '$lozinka'";
    $rez = mysqli_query($db, $upit);
    $pronadjeno = mysqli_num_rows($rez);

    if($pronadjeno == 1) {
        echo $pronadjeno;

        // Podaci o korisniku
        $niz = mysqli_fetch_assoc($rez);
        extract($niz);

        // Kreiranje sesije
        session_start();

        $_SESSION["id"] = $id;
        $_SESSION["ime"] = $ime;
        $_SESSION["prezime"] = $prezime;
        $_SESSION["email"] = $email;
        $_SESSION["status"] = $status;

        // Logovanje prijave
        $datum = date_create();
        $datumString = $datum->format("Y-m-d");
        $datumVreme = $datum->format("H:i:s");
    
        $nazivFajla = $datumString . "_log.txt";

        $file = fopen("../logovi/".$nazivFajla, "a");

        $upis = "$datumVreme - Prijava korisnika '$email'\n";
        fwrite($file, $upis);

        fclose($file);
    } else {
        echo "Pogrešan email ili lozinka!!!";
    }

    mysqli_close($db);
?>