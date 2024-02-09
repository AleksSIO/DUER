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
    <div class="block-p">
        <p class="p1">✅ Felicitations! ✅</p>
        <p class="p2">Les informations ont ete transmis à la base de donnees.</p>
        <?php
		// récupération du nombre de lignes traitées - dans le cas où on est après une insertion
			$n=$_GET["nb"]; // récupère la valeur transmise dans $url
			echo "$n lignes insérées</p>";
		?>
        <a href="vue_acceuil.php">Retour accueil</a>
    </div>
</body>
</html>