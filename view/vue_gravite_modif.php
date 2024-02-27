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
        <title>Modif Gravite</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7 text-dark fst-italic justify-content-center align-intems-center border border-dark p-2 mb-2 border-opacity-75 border-4 d-flex">
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
            <?php
                include 'modele.php';
                $action=$_GET["action"];
                $gravite = array(); 
                $gravite = one_select_gravite($action); 
            ?>
            <form align="center" action="controleur_modif.php" method="post">
                <input type="hidden" name="mode" value="5">    

                <label for="Id_Gravite">Num</label>
                <input type='text' name="Id_Gravite" id="Id_Gravite" value="<?=$gravite['Id_Gravite']?>"  readonly="readonly">
                <label for="Blessure_graves_ou_deces">Blessure graves ou deces</label>
                <input type="text" name="Blessure_graves_ou_deces" id="Blessure_graves_ou_deces" value="<?=$gravite['Blessure_graves_ou_deces']?>">
                <label for="maladie_mortelle">Maladie mortelle</label>
                <input type="text" name="maladie_mortelle" id="maladie_mortelle" value="<?=$gravite['maladie_mortelle']?>">	
                <label for="penibilite_physique">Penibilite physique</label>
                <input type="text" name="penibilite_physique" id="penibilite_physique" value="<?=$gravite['penibilite_physique']?>">	
                <label for="peniibilite_mentale">Peniibilite mentale</label>
                <input type="text" name="peniibilite_mentale" id="peniibilite_mentale" value="<?=$gravite['peniibilite_mentale']?>">		
                
                <input class="btn btn-success" type="submit" value="Modifier" name="submit">
            </form>

    </body>
</html>
