<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384- 
        Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="images/profile.jpg" rel="icon">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: white;">
    <div class="container">
        <div class="row justify-content-center">
            <div
                class="col-7 text-dark fst-italic justify-content-center align-intems-center border border-dark p-2 mb-2 border-opacity-75 border-4 d-flex">
                <h1>D.U.E.R.P</h1>

            </div>
        </div>
        <div class="row bg-sombre text-white fw-bolder justify-content-center align-intems-center">
            <div class="row p-3 mb-2 text-white fw-bolder placeholder-glow">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                      <?php if(!isset($_SESSION['loggedin'])) { ?>
                      <a class="btn btn-dark" href="vue_acceuil.php" role="button">Acceuil</a>
                      <a class="btn btn-dark" href="login.php" role="button">Se connecter</a>
                      
                      <?php } elseif($_SESSION['loggedin'] == true){ ?>
          
                      <a class="btn btn-dark" href="vue_acceuil.php" role="button">Acceuil</a>
                      <a class="btn btn-dark" href="controleur_b.php?mode=3" role="button">Se deconnecter</a>
                      <a class="btn btn-dark" href="vue_risques.php" role="button">Risques</a> 
                      <a class="btn btn-dark" href="vue_unite_de_travail.php" role="button">Unité de travail (salle)</a>
                      <a class="btn btn-dark" href="vue_famille_de_risque.php" role="button">Famille de risque</a> 
                      <a class="btn btn-dark" href="vue_personne_exposees.php" role="button">Personne exposées</a>
                      <a class="btn btn-dark" href="vue_gravite.php" role="button">Gravité</a> 
                      <a class="btn btn-dark" href="vue_probabilite.php" role="button">Probabilité</a>
                      <a class="btn btn-dark" href="vue_resolution_de_la_situation.php" role="button">Résolution de la situation</a>
                      <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <form action="controleur_supp.php" method="POST">
        <input type="hidden" name="mode" value="8">

        <table width="98%" align="center">
            <tr>
                <td align="center" colspan="24">
                    <h3>Informations Risques</h3> </b>
                </td>
            </tr>
            <tr style='border-bottom:1pt solid black;'>
                <th></th>
                <th width="">etat</th>
                <th width="">date_creation</th>
                <th width="">date_modif</th>
                <th width="">images</th>
                <th width="">nom</th>
                <th width="">prenom</th>
                <th width="">precis</th>
                <th width="">probabilite</th>
                <th width="">famille</th>
                <th width="">emplacement</th>
                <th width="">salle</th>
                <th width="">EN</th>
                <th width="">ATTEE</th>
                <th width="">eleves</th>
                <th width="">blessures</th>
                <th width="">maladie</th>
                <th width="">physique</th>
                <th width="">mentale</th>
                <th width="">complexite</th>
                <th width="">solution</th>
                <th width="">Modif</th>
                <th width="">V</th>
                <th width="">R</th>

            </tr>
            <?php
                        include 'modele.php';
                        $risques = array(); 
                        $risques = select_risque();
                        
                        foreach($risques as $risque) {
                            
                            if ( $risque['etat'] == 'EN_COURS'){
                                $couleur = '#FFA500';
                            } elseif ($risque['etat'] == 'Valide'){
                                $couleur = '#00FF00';
                            } elseif ($risque['etat'] == 'Invalide') {
                                $couleur = '#FF0000';
                            }

                    ?>

            <tr style='border-bottom:1pt solid black;'>
                <td><input type='checkbox' name='risques[]' value='<?=$risque['Id_Risques']?>'></td>
                <td style="background-color: <?=$couleur?>;"><?=$risque['etat']?></td>
                <td><?=$risque['date_creation']?></td>
                <td><?=$risque['date_derniere_modification']?></td>
                <td>
                    <span class="hover-container">
                        <?= $risque['nomimage'] ?>
                        <span class="hover-overlay">
                            <img src="<?= $risque['image'] ?>" alt="Image Preview" class="hover-preview">
                        </span>
                    </span>
                </td>
                <td><?=$risque['nom']?></td>
                <td><?=$risque['prenom']?></td>
                <td><?=$risque['precis']?></td>
                <td><?=$risque['probabilite']?></td>
                <td><?=$risque['famille']?></td>
                <td><?=$risque['emplacement_precis']?></td>
                <td><?=$risque['salle']?></td>
                <td><?=$risque['tous_les_personnels_EN']?></td>
                <td><?=$risque['tous_les_ATTEE']?></td>
                <td><?=$risque['tous_les_eleves']?></td>
                <td><?=$risque['Blessure_graves_ou_deces']?></td>
                <td><?=$risque['maladie_mortelle']?></td>
                <td><?=$risque['penibilite_physique']?></td>
                <td><?=$risque['peniibilite_mentale']?></td>
                <td><?=$risque['complexite_de_resolution']?></td>
                <td><?=$risque['solution_onereuse']?></td>



                <td><a href='vue_risques_modif.php?action=<?=$risque['Id_Risques']?>'><input class='btn btn-primary'
                            type='button' value='Modifier'></a></td>
                <?php if ( $risque['etat'] == 'EN_COURS'){ ?>
                <td><a href='controleur_b.php?mode=1&num=<?=$risque['Id_Risques']?>'><input class='btn btn-success'
                            type='button' value='V' name='valide'></a></td>
                <td><a href='controleur_b.php?mode=2&num=<?=$risque['Id_Risques']?>'><input class='btn btn-danger'
                            type='button' value='R' name='invalide'></a></td>
                <?php  }  elseif ($risque['etat'] == 'Valide'){ ?>
                <td><input class='btn btn-secondary' type='button' value='V' name='valide'></td>
                <td><a href='controleur_b.php?mode=2&num=<?=$risque['Id_Risques']?>'><input class='btn btn-danger'
                            type='button' value='R' name='invalide'></a></td>
                <?php  }  elseif ($risque['etat'] == 'Invalide'){ ?>
                <td><a href='controleur_b.php?mode=1&num=<?=$risque['Id_Risques']?>'><input class='btn btn-success'
                            type='button' value='V' name='valide'></a></td>
                <td><input class='btn btn-secondary' type='button' value='R' name='invalide'></td>
                <?php  } ?>


            </tr>
            <?php } ?>
            <tr>
                <td align="center" colspan="24">
                    <input class="btn btn-success" type="button" onclick="location.href='index.php'" value="Ajouter" />

                    <input class="btn btn-danger" type="submit" value="Supprimer" name="supprimer">
                </td>
            </tr>
        </table>
        <style>
        .hover-container {
            position: relative;
            display: inline-block;
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .hover-container:hover .hover-overlay {
            opacity: 1;
        }

        .hover-image {
            width: 20px;
            /* Ajustez la largeur de l'image à 20px */
            height: 20px;
            /* Ajustez la hauteur de l'image à 20px */
        }

        .hover-preview {
            display: block;
            margin: 0 auto;
            max-width: 200px;
            max-height: 200px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        </style>



        </fieldset>
    </form>

</body>

</html>