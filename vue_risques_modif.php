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
    <?php
        include 'modele.php';
        $action=$_GET["action"];
        $risques = array(); 
        $risques = one_select_risque($action);
        
        $salles = array();
        $salles = select_unite_de_travail();

        $familles = array();
        $familles = select_famille_de_risque();
    ?>
    <form align="center" action="controleur_modif.php" method="post">
        <input type="hidden" name="mode" value="8">
        <input type="hidden" value="<?=$risques['Id_Famille_de_risque']?>" name="Id_Famille_de_risque" />
        <input type="hidden" value="<?=$risques['Id_Utilisateur']?>" name="Id_Utilisateur" />
        <input type="hidden" value="<?=$risques['Id_Situation_dangereuse']?>" name="Id_Situation_dangereuse" />
        <input type="hidden" value="<?=$risques['Id_Localisation']?>" name="Id_Localisation" />
        <input type="hidden" value="<?=$risques['Id_Unite_de_travail']?>" name="Id_Unite_de_travail" />

        <label for="Id_Risques">Num</label>
        <input type='text' name="Id_Risques" id="Id_Risques" value="<?=$risques['Id_Risques']?>" readonly="readonly">

        <label for="date_creation">date_creation</label>
        <input type="text" name="date_creation" id="date_creation" value="<?=$risques['date_creation']?>"
            readonly="readonly">

        <label for="etat">etat</label>
        <input type="text" name="etat" id="etat" value="<?=$risques['etat']?>" readonly="readonly">

        <div class="form-row marge">
            <div class="row justify-content-center">
                <div class="form-group col-md-4 ">
                    <label for="inputEmail4">Nom:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nom" placeholder="Entrer votre nom"
                        value="<?=$risques['nom']?>">
                </div></br>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Prénom:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="prenom"
                        placeholder="Entrer votre Prénom" value="<?=$risques['nom']?>">
                </div></br>
            </div></br>
            <div class="row justify-content-center">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email:</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email"
                        placeholder="Entrer votre Email" value="<?=$risques['email']?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Unité de travail (salle):</label>
                    <select id="inputState" name="salle" class="form-control">
                        <option selected><?=$risques['salle']?></option>
                        <?php foreach ($salles as $salle): ?>
                        <option value="<?= $salle['salle'] ?>"><?= $salle['salle'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div></br>
            <div class="row justify-content-center">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Localisation:</label>
                    <input type="text" class="form-control" id="inputAddress" name="emplacement_precis"
                        placeholder="Précision spaciale dans la pièce" value="<?=$risques['emplacement_precis']?>">
                </div></br>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Situation dangereuse:</label>
                    <input type="text" class="form-control" id="inputAddress" name="precis"
                        placeholder="Donner une Précision (ex:Interrupteur côté porte...)"
                        value="<?=$risques['precis']?>">
                </div>
            </div><br>
            <div class="row justify-content-center">
                <div class="form-group col-md-4">
                    <label for="inputState">Famille de risque:</label>
                    <select id="inputState" name="famille" class="form-control">
                        <option selected "><?=$risques['famille']?></option>
                            <?php foreach ($familles as $famille): ?>
                        <option value=" <?= $famille['famille'] ?>"><?= $famille['famille'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><br><br>

            <!--
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
                                <td><input type="radio" name="tous_les_personnels_en" value="0"> </td>
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
                    <div class="form-group col-md-3">
                        <input class="form-control form-control-sm" type='file' name='files[]' multiple />
                    </div>
                </div>
                <button class="col-3" type="submit" name="submit" class="btn btn-dark">Envoyer</button>
    </form>

    <label for="nomimage">nomimage</label>
    <input type="text" name="nomimage" id="nomimage" value="<?=$risques['nomimage']?>">
    <br>

    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom" value="<?=$risques['nom']?>">
    <br>

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" id="prenom" value="<?=$risques['prenom']?>">
    <br>

    <label for="precis">precis</label>
    <input type="text" name="precis" id="precis" value="<?=$risques['precis']?>">
    <br>

    <label for="probabilite">probabilite</label>
    <input type="text" name="probabilite" id="probabilite" value="<?=$risques['probabilite']?>">
    <br>

    <label for="emplacement_precis">emplacement</label>
    <input type="text" name="emplacement_precis" id="emplacement_precis" value="<?=$risques['emplacement_precis']?>">
    <br>

    <label for="salle">salle</label>
    <input type="text" name="salle" id="salle" value="<?=$risques['salle']?>">
    <br>

    <label for="tous_les_personnels_EN">tous_les_personnels_EN</label>
    <input type="text" name="tous_les_personnels_EN" id="tous_les_personnels_EN"
        value="<?=$risques['tous_les_personnels_EN']?>">
    <br>

    <label for="tous_les_ATTEE">tous_les_ATTEE</label>
    <input type="text" name="tous_les_ATTEE" id="tous_les_ATTEE" value="<?=$risques['tous_les_ATTEE']?>">
    <br>

    <label for="tous_les_eleves">tous_les_eleves</label>
    <input type="text" name="tous_les_eleves" id="tous_les_eleves" value="<?=$risques['tous_les_eleves']?>">
    <br>

    <label for="Blessure_graves_ou_deces">Blessure_graves_ou_deces</label>
    <input type="text" name="Blessure_graves_ou_deces" id="Blessure_graves_ou_deces"
        value="<?=$risques['Blessure_graves_ou_deces']?>">
    <br>

    <label for="maladie_mortelle">maladie_mortelle</label>
    <input type="text" name="maladie_mortelle" id="maladie_mortelle" value="<?=$risques['maladie_mortelle']?>">
    <br>

    <label for="penibilite_physique">penibilite_physique</label>
    <input type="text" name="penibilite_physique" id="penibilite_physique" value="<?=$risques['penibilite_physique']?>">
    <br>

    <label for="peniibilite_mentale">peniibilite_mentale</label>
    <input type="text" name="peniibilite_mentale" id="peniibilite_mentale" value="<?=$risques['peniibilite_mentale']?>">
    <br>

    <label for="complexite_de_resolution">complexite_de_resolution</label>
    <input type="text" name="complexite_de_resolution" id="complexite_de_resolution"
        value="<?=$risques['complexite_de_resolution']?>">
    <br>

    <label for="solution_onereuse">solution_onereuse</label>
    <input type="text" name="solution_onereuse" id="solution_onereuse" value="<?=$risques['solution_onereuse']?>">
    <br>
    -->


            <input class="btn btn-success" type="submit" value="Modifier" name="submit">
    </form>

</body>

</html>