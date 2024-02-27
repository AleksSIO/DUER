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
        <title>Gravite</title>
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
            <form action="controleur_supp.php" method="POST">
            <input type="hidden" name="mode" value="5">

                <table  width="60%" align="center">
                    <tr >
                        <td align="center" colspan="6"><b><h3>Informations Gravite</h3></b></td>
                    </tr>
                    <tr  style='border-bottom:1pt solid black;' style='border-left:1pt solid black;'>
                        <th>#</th>    
                        <th>Num</th>
                        <th width="20%" text-align="center">Blessures graves ou deces</th>
                        <th width="20%" text-align="center">Maladie mortelle</th>
                        <th width="20%" text-align="center">Penebilite physique</th>
                        <th width="20%" text-align="center">Penebilite mentale</th>
                        <th width="5%"  text-align="center">Modifier</th>

                    </tr>  
                    <?php
                        include 'modele.php';
                        $gravite = array(); 
                        $gravite = select_gravite(); 
                        $nb = count($gravite); 

                        if($nb > 0) 
                        {
                            $i=0;						
                            while ($i<$nb)
                            {
                                $grav=$gravite[$i];  
                                $num=$grav['Id_Gravite'];			
                                $b_graves  =$grav['Blessure_graves_ou_deces'];
                                $m_mortelle=$grav['maladie_mortelle'];
                                $p_physique=$grav['penibilite_physique'];
                                $p_mentale =$grav['peniibilite_mentale'];

                                echo "<tr style='border-bottom:1pt solid black;' ><td align='center'><input type='checkbox' name='gravite[]' value='$num'></td>";
                                echo "<td>$num</td>";
                                echo "<td>$b_graves</td>";
                                echo "<td>$m_mortelle</td>";
                                echo "<td>$p_physique</td>";
                                echo "<td>$p_mentale</td>";
                                echo "<td><a href='vue_gravite_modif.php?action=$num'><input class='btn btn-primary' type='button' value='Modifier'></a></td>";
                                echo "</tr>";
                                $i=$i+1;
                            }
                        }	
              
                    ?>
                    <tr>
                        <td colspan="6" align="center">
                            <input class="btn btn-success" type="button" onclick="location.href='index.php'" value="Ajouter" />

                            <input class="btn btn-danger" type="submit" value="Supprimer" name="supprimer">
                        </td>
                    </tr>
                </table>
                <table border=0>
                    
                </table>
            </form>

    </body>
</html>
