<?php 

session_start();

 if(!$_SESSION['loggedin'] || $_SESSION['role'] != 'util') {
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
    <title>Utilisateur | DUERP</title>
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
        <div class="user-menu">
        <div class="form-case">
        <a href="vue_formulaire.php"><button class="form-button-user">Formulaire</button></a>
        </div>
        <div class="logout">
        <form  method=post action="../controller/controleur.php">
        <input type="hidden" name="mode" value="3">
        <button class="logout-button-user" type="submit">Se déconnecter</button>
        </form>
        </div>
        </div>
        <div class="text-reception"><p>Boîte de réception</p></div>
        <div class="reception">
        <form method="post" class="pdf-form" action="../controller/generer_pdf.php">
        <?php 
        require "../model/modele.php";

        $les_risques = select_risques();

        foreach($les_risques as $risque){
            $date_creation = strtotime($risque['date_creation']);
            $date_formattee = date("d/m/Y", $date_creation); // Formatage de la date
            $heure_formattee = date("H:i", $date_creation); // Formatage de l'heure
        ?>  
            <form method="post" class="pdf-form" action="../controller/generer_pdf.php">
            <input type="hidden" name="id_risque" value="<?php echo $risque['Id_Risques']; ?>">
            <div class="risque-card"> 
            <div class="text-card">
                <p class="nom-prenom"><?php echo $risque['nom']." ".$risque['prenom']; ?></p>
                <p class="email"><?php echo $risque['email']; ?></p>
                <p class="etat">Etat : <?php echo $risque['etat']; ?></p>
                <p class="date-creation">Soumis le : <?php echo $date_formattee." à ".$heure_formattee; ?></p>
            </div>
            <button type="submit" class="pdf-button" name="submit_<?php echo $risque['Id_Risques']; ?>" title="Télécharger le récapitulatif en PDF">
                <img src="../assets/pdf_icon.png" class="pdf-logo">
            </button>
            <button class="more-button" title="En savoir plus">
                <img src="../assets/dots.png" class="more-logo">
            </button>
            </div>
            </form>
        <?php
        }
        ?>
    </form>
        </div>
        </div>
    </div>
</body>
</html>