<?php
    session_start();

    if(isset($_GET["odjava"])){
        session_unset();
        session_destroy();
    }

    if(isset($_SESSION["id"])){
        header("Location: dodajKnjigu.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="alert alert-info text-center m-2">
        <h2>VIŠER prodavnica knjiga</h2>
        <input type="text" name="email" id="email" placeholder="Unesite email">
        <br>
        <br>
        <input type="text" name="lozinka" id="lozinka" placeholder="Unesite lozinku">
        <br>
        <br>
        <button class="btn btn-primary" onclick="prijava()">Prijava</button>
        <br>
        <br>
        <div class="alert alert-danger" id="poruka"></div>
    </div>
</body>
</html>