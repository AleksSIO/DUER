<?php 

session_start();

 if(!$_SESSION['loggedin'] || $_SESSION['role'] != 'admin') {
    header('Location:page404.php');
 }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Administrateur | DUERP</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../scripts/session.js" defer></script>
</head>
<body>
    <div class="block-p">
        <div class="titres-accueil-">
        <p class="p1">Accueil</p>
        <?php

        echo "<p class='p2'>Utilisateur connecté : ".$_SESSION['user']."</p>";

        ?>
        </div>
        <div class="logo-accueil">  
        <img src="../assets/duer_logo.png" class="logo">
        </div>
        <div class="admin-menu">
        <div class="form-case">
        <a href="vue_formulaire.php"><button class="form-button-user">Formulaire</button></a>
        </div>
        <div class="risques-case">
        <a href="vue_risques.php"><button class="form-button-user">Risques</button></a>
        </div>
        <div class="famille-risques-case">
        <a href="vue_famille_de_risque.php"><button class="form-button-user">Famille de risques</button></a>
        </div>
        <div class="gravite-case">
        <a href="vue_gravite.php"><button class="form-button-user">Gravité</button></a>
        </div>
        <div class="per-exp-case">
        <a href="vue_personne_exposees.php"><button class="form-button-user">Personnes exposées</button></a>
        </div>
        <div class="proba-case">
        <a href="vue_probabilite.php"><button class="form-button-user">Probabilité</button></a>
        </div>
        <div class="resol-case">
        <a href="vue_resolution_de_la_situation.php"><button class="form-button-user">Résolution de la situation</button></a>
        </div>
        <div class="unite-case">
        <a href="vue_unite_de_travail.php"><button class="form-button-user">Unité de travail</button></a>
        </div>
        <div class="logout">
        <form  method=post action="../controller/controleur.php">
        <input type="hidden" name="mode" value="3">
        <button class="logout-button-admin" type="submit">Se déconnecter</button>
        </form>
        </div>
        </div>

    </div>
</body>
</html>