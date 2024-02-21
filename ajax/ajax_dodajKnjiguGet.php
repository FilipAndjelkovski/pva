<?php
    session_start();

    $db = mysqli_connect("localhost", "root", "", "pva_k2_g2");

    $upit = "SELECT * FROM `veza_knjige_korisnici` order by vremeK desc";
    $rez = mysqli_query($db, $upit);
    $niz = mysqli_fetch_all($rez, MYSQLI_ASSOC);

    foreach ($niz as $knjiga) {
        $naslov = $knjiga["naslov"];
        $autor = $knjiga["autor"];
        $vremeK = $knjiga["vremeK"];
        $ime = $knjiga["ime"];
        $prezime = $knjiga["prezime"];
        $idKnjige = $knjiga["id"];
        $idKorisnika = $knjiga["idKorisnika"];

        $idPrijavljen = $_SESSION["id"];

        echo "<div class='alert alert-secondary'>
        <i>$vremeK</i>
        <br>
        <strong>$naslov</strong>
        ($autor)
        <br>
        <i>$ime $prezime</i>";

        if($idPrijavljen == $idKorisnika){
            echo "<br>
            <button class='btn btn-danger' onclick='obrisiKnjigu($idKnjige)'>Obriši</button>";
        }        

        echo "</div>";
    }

    mysqli_close($db);
?>