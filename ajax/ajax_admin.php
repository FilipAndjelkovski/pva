<?php
    if(!isset($_GET["trazeniDatum"])){
        return false;
    }

    extract($_GET);

    $datum = date_create($trazeniDatum);
    $datumString = $datum->format("Y-m-d");
    $datumVreme = $datum->format("H:i:s");

    $nazivFajla = $datumString . "_log.txt";
    $nazivFajla = "../logovi/" . $nazivFajla;

    if(file_exists($nazivFajla)){
        $file = fopen($nazivFajla, "r");

        while(!feof($file)) {
            echo fgets($file) . "<br>";
        }

        fclose($file);
    } else {
        echo "Ne postoji logfile za taj datum!!!!";
    }
?>