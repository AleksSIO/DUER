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
    <title>Risques | DUERP</title>
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
        <p class="p1">Liste des risques</p>
        </div>
        <div class="liste-risques">
            <table>
                <tr>
                    <td class="titre">N° Risque</td>
                    <td class="titre">Etat</td>
                    <td class="titre">Date de création</td>
                    <td class="titre">Date de modification</td>
                    <td class="titre">Id Photo</td>
                    <td class="titre">Id Utilisateur</td>
                    <td class="titre">Id Situation dangereuse</td>
                    <td class="titre">Id Probabilité</td>
                    <td class="titre">Id Famille de risque</td>
                    <td class="titre">Id Localisation</td>
                    <td class="titre">Id Unité de travail</td>
                    <td class="titre">Id Personnes exposées</td>
                    <td class="titre">Id Gravité</td>
                    <td class="titre">Id Solution de la situation</td>
                    <td class="titre">Total Evaluation</td>
                    <td class="titre">Modification</td>
                </tr>
                <?php 
                require_once('../model/modele.php');

                $les_risques = liste_risques();
                 if(empty($les_risques)){
                    echo "<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
                } else {
                    foreach($les_risques as $risque){
                        echo "<tr>
                        <td><input type='text' name='Id_Risques' class='cell' disabled='disabled' value='".$risque['Id_Risques']."'></td>
                        <td><input type='text' name='etat' class='cell' disabled='disabled' value='".$risque['etat']."'></td>
                        <td><input type='text' name='date_creation' class='cell' disabled='disabled' value='".$risque['date_creation']."'></td>
                        <td><input type='text' name='date_derniere_modification' class='cell' disabled='disabled' value='".$risque['date_derniere_modification']."'></td>
                        <td><input type='text' name='Id_Photos' class='cell' disabled='disabled' value='".$risque['Id_Photos']."'></td>
                        <td><input type='text' name='Id_Utilisateur' class='cell' disabled='disabled' value='".$risque['Id_Utilisateur']."'></td>
                        <td><input type='text' name='Id_Situation_dangereuse' class='cell' disabled='disabled' value='".$risque['Id_Situation_dangereuse']."'></td>
                        <td><input type='text' name='Id_Probabilite' class='cell' disabled='disabled' value='".$risque['Id_Probabilite']."'></td>
                        <td><input type='text' name='Id_Famille_de_risque' class='cell' disabled='disabled' value='".$risque['Id_Famille_de_risque']."'></td>
                        <td><input type='text' name='Id_Localisation' class='cell' disabled='disabled' value='".$risque['Id_Localisation']."'></td>
                        <td><input type='text' name='Id_Unite_de_travail' class='cell' disabled='disabled' value='".$risque['Id_Unite_de_travail']."'></td>
                        <td><input type='text' name='Id_personne_exposees' class='cell' disabled='disabled' value='".$risque['Id_personne_exposees']."'></td>
                        <td><input type='text' name='Id_Gravite' class='cell' disabled='disabled' value='".$risque['Id_Gravite']."'></td>
                        <td><input type='text' name='Id_solution_de_la_situation' class='cell' disabled='disabled' value='".$risque['Id_solution_de_la_situation']."'></td>
                        <td><input type='text' name='total_evaluation' class='cell' disabled='disabled' value='".$risque['total_evaluation']."'></td>
                        <td><button class='modif-button'><img class='update-svg' src='../assets/update.svg'></button></td>
                    </tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <script src="../scripts/edit_cell.js" defer></script>
</body>
</html>