<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Resultat</title>
</head>
<body>
    <div class="block-f">
        <p class="p3">❌ Malheuresement ❌</p>
        <p class="p4">Les informations n'ont pas ete transmis à la base de donnees.</p>
        <?php
            $erreur=$_GET["erreur"];
            echo "<p class='erreur'>$erreur</p>";
        ?>
        <!-- Lien pour retourner à la page initiale -->
        <a href="vue_acceuil.php">Retour accueil</a>
    </div>
</body>
</html>