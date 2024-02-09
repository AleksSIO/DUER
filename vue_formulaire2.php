<?php 

session_start();


include 'modele.php';

$salles = array();
$salles = select_unite_de_travail();

$familles = array();
$familles = select_famille_de_risque();
/*
if (isset($_SESSION['loggedin'])){
  echo "vous etes connecter";

}else{
  echo "vous n'etes pas connecter";
}
*/
?>
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
                <div class="col-7 text-dark fst-italic justify-content-center align-intems-center border border-dark p-2 mb-2 border-opacity-75 border-4 d-flex">
                    <h1>D.U.E.R.P</h1>
                
                </div>
            </div>
            <div class="row bg-sombre text-white fw-bolder justify-content-center align-intems-center">
                <div class="row p-3 mb-2 text-white fw-bolder placeholder-glow">      
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                      <?php if(!isset($_SESSION['loggedin'])) { ?>
                      <a class="btn btn-dark" href="index.php" role="button">Accueil</a>
                      <a class="btn btn-dark" href="index.php" role="button">Se connecter</a>
                      
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
            
            
            <div class="base-form">
                <form class="formulaire" method="POST" action="controleur.php" enctype='multipart/form-data'>
                <input type="hidden" name="mode" value="1">    
                <div class="form-row marge">
                      <div class="row justify-content-center">
                        <div class="form-group col-md-4 ">
                          <label for="inputEmail4">Nom:</label>
                          <input type="text" class="form-control" id="inputEmail4" name="nom" placeholder="Entrer votre nom">
                        </div></br>
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Prénom:</label>
                          <input type="text" class="form-control" id="inputEmail4" name="prenom" placeholder="Entrer votre Prénom">
                        </div></br>
                      </div></br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Email:</label>
                          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Entrer votre Email">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputState">Unité de travail (salle):</label>
                          <select id="inputState" name="salle" class="form-control">
                            <option selected>Choisir...</option>
                            <?php foreach ($salles as $salle): ?>
                            <option value="<?= $salle['salle'] ?>"><?= $salle['salle'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div></br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                          <label for="inputAddress">Localisation:</label>
                          <input type="text" class="form-control" id="inputAddress" name="emplacement_precis" placeholder="Précision spaciale dans la pièce">
                        </div></br>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Situation dangereuse:</label>
                            <input type="text" class="form-control" id="inputAddress" name="precis" placeholder="Donner une Précision (ex:Interrupteur côté porte...)">
                        </div>
                      </div><br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                          <label for="inputState">Famille de risque:</label>
                          <select id="inputState" name="famille" class="form-control">
                            <option selected>Choisir...</option>
                            <?php foreach ($familles as $famille): ?>
                            <option value="<?= $famille['famille'] ?>"><?= $famille['famille'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div><br><br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                          <h3>Personne exposées</h3>
                          <table>
                            <thead>
                              <tr>
                                <th>Catégorie</th>
                                <th>0</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Tous les personnels EN</td>
                                <td><input type="radio" name="tous_les_personnels_en" value="0"></td>
                                <td><input type="radio" name="tous_les_personnels_en" value="1"></td>
                                <td><input type="radio" name="tous_les_personnels_en" value="2"></td>
                                <td><input type="radio" name="tous_les_personnels_en" value="3"></td>
                                <td><input type="radio" name="tous_les_personnels_en" value="4"></td>
                              </tr>
                              <tr>
                                <td>Tous les ATTEE</td>
                                <td><input type="radio" name="tous_les_ATTEE" value="0"></td>
                                <td><input type="radio" name="tous_les_ATTEE" value="1"></td>
                                <td><input type="radio" name="tous_les_ATTEE" value="2"></td>
                                <td><input type="radio" name="tous_les_ATTEE" value="3"></td>
                                <td><input type="radio" name="tous_les_ATTEE" value="4"></td>
                              </tr>
                              <tr>
                                <td>Tous les élèves</td>
                                <td><input type="radio" name="tous_les_eleves" value="0"></td>
                                <td><input type="radio" name="tous_les_eleves" value="1"></td>
                                <td><input type="radio" name="tous_les_eleves" value="2"></td>
                                <td><input type="radio" name="tous_les_eleves" value="3"></td>
                                <td><input type="radio" name="tous_les_eleves" value="4"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div><br><br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                          <h3>Gravité</h3>
                          <table>
                            <thead>
                                <tr>
                                <th>Catégorie</th>
                                <th>0</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                              </thead>
                                </tr>
                            <tr>
                            <tbody>
                                <td>Blessures Graves</td>
                                <td><input type="radio" name="blessures" value="0"></td>
                                <td><input type="radio" name="blessures" value="1"></td>
                                <td><input type="radio" name="blessures" value="2"></td>
                                <td><input type="radio" name="blessures" value="3"></td>
                                <td><input type="radio" name="blessures" value="4"></td>
                                </tr>
                                <tr>
                                <td>Maladies Mortelles</td>
                                <td><input type="radio" name="maladies" value="0"></td>
                                <td><input type="radio" name="maladies" value="1"></td>
                                <td><input type="radio" name="maladies" value="2"></td>
                                <td><input type="radio" name="maladies" value="3"></td>
                                <td><input type="radio" name="maladies" value="4"></td>
                                </tr>
                                <tr>
                                <td>Pénibilité Physique</td>
                                <td><input type="radio" name="penibilite_physique" value="0"></td>
                                <td><input type="radio" name="penibilite_physique" value="1"></td>
                                <td><input type="radio" name="penibilite_physique" value="2"></td>
                                <td><input type="radio" name="penibilite_physique" value="3"></td>
                                <td><input type="radio" name="penibilite_physique" value="4"></td>
                                </tr>
                                <tr>
                                <td>Pénibilité Mentale</td>
                                <td><input type="radio" name="penibilite_mentale" value="0"></td>
                                <td><input type="radio" name="penibilite_mentale" value="1"></td>
                                <td><input type="radio" name="penibilite_mentale" value="2"></td>
                                <td><input type="radio" name="penibilite_mentale" value="3"></td>
                                <td><input type="radio" name="penibilite_mentale" value="4"></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                      </div><br><br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                          <h3>Probabilité</h3>
                          <table>
                            <thead>
                              <tr>
                                <th>Catégorie</th>
                                <th>0</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Probabilité</td>
                                <td><input type="radio" name="probabilite" value="0"></td>
                                <td><input type="radio" name="probabilite" value="1"></td>
                                <td><input type="radio" name="probabilite" value="2"></td>
                                <td><input type="radio" name="probabilite" value="3"></td>
                                <td><input type="radio" name="probabilite" value="4"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div><br><br>
                      <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                          <h3>Résolution de la situation</h3>
                          <table>
                            <thead>
                              <tr>
                                <th>Catégorie</th>
                                <th>0</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Complexité de Résolution</td>
                                <td><input type="radio" name="complexite_de_resolution" value="0"></td>
                                <td><input type="radio" name="complexite_de_resolution" value="1"></td>
                                <td><input type="radio" name="complexite_de_resolution" value="2"></td>
                                <td><input type="radio" name="complexite_de_resolution" value="3"></td>
                                <td><input type="radio" name="complexite_de_resolution" value="4"></td>
                              </tr>
                              <tr>
                                <td>Solution Onéreuse</td>
                                <td><input type="radio" name="solution_onereuse" value="0"></td>
                                <td><input type="radio" name="solution_onereuse" value="1"></td>
                                <td><input type="radio" name="solution_onereuse" value="2"></td>
                                <td><input type="radio" name="solution_onereuse" value="3"></td>
                                <td><input type="radio" name="solution_onereuse" value="4"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div><br><br>
                        <div class="row justify-content-center">
                          <div class="form-group col-md-3 mt-4 mb-4">
                            <input class="form-control form-control-sm" type='file' name='files[]' multiple />
                          </div>
                        </div>
                    <button  class="col-3 mb-5" type="submit" name="submit" class="btn btn-dark">Envoyer</button>
                  </form>
            </div>
           




        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>


























<!--Produit par Mahamamadou gory-->
