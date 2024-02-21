<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("Location: index.php");
    } else {
        extract($_SESSION);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/dodajKnjigu.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid p-2">
        <div class="alert alert-info">
            <?php
                echo "Korisnik: $ime $prezime ($status)";
            ?>
            <br>
            <a href="dodajKnjigu.php">Sve knjige</a> | <a href="index.php?odjava=1">Odjava</a>
            <?php
                if($status == "Administrator"){
                    echo " |  <a href='admin.php'>Administracija</a>";
                }
            ?>
        </div>

        <div class="alert alert-success">
            <input size="130" type="text" name="naslov" id="naslov" placeholder="Unesite naslov">
            <br><br>
            <input size="130" type="text" name="autor" id="autor" placeholder="Unesite autora">
            <br><br>
            <input size="130" type="text" name="brStrana" id="brStrana" placeholder="Unesite broj stranica knjige">
            <br><br>
            <button class="btn btn-primary" onclick="snimiKnjigu()">Snimi knjigu</button>
        </div>

        <div class="alert alert-danger" id="poruka"></div>

        <h2>Knjige</h2>
        <input type="text" id="termin" name="termin" placeholder="Unesite termin pretrage">
        <button class="btn btn-primary btn-sm">Pretraži</button>

        <div id="knjige">
            <!-- <div class="alert alert-secondary">
                <i>datum</i>
                <br>
                <strong>naslov</strong>
                (autor)
                <br>
                <i>korisnik</i>
                <br>
                <button class="btn btn-danger">Obriši</button>
            </div> -->
        </div>
    </div>
</body>
</html>