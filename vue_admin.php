<?php 

session_start();

 if(!$_SESSION['loggedin']) {
    header('Location:page404.php');
 }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Administrateur | DUERP</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="./scripts/session.js" defer></script>
</head>
<body>
    <div class="block-p">
        <div class="titres-accueil-">
        <p class="p1">Accueil</p>
        <p class="p2">Bienvenue à l'accueil de l'application DUERP.</p>
        </div>
        <div class="logo-accueil">  
        <img src="assets/duer_logo.png" class="logo">
        </div>
        <div class="acces-accueil">
        <div class="form-login">
        <form  method=post action="controleur.php">
        <input type="hidden" name="mode" value="2">
        <div class="input-container">
            <input placeholder="Email" type="email" name="mail">
        </div>
        <div class="input-container">
            <input placeholder="Mot de passe" type="password" name="password">
        </div>
        <a class="pass-ft" href="">Mot de passe oublié</a>
            <button class="submit-login" type="submit" name="submit">
            Se connecter
            </button>
        </form>
        </div>
        <div class="boutons-accueil">
        <a href="vue_formulaire.php"><button class="form-button">Formulaire</button></a>
        </div>
        </div>

    </div>
</body>
</html>