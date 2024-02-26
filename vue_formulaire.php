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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire | DUERP</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="block-p">
        <div class="titres-accueil-">
        <p class="p1">Formulaire</p>
        </div>
        <div class="formulaire pg-1 visible">
            <form name="myform" method="post" action="controleur.php" enctype='multipart/form-data'>
            <input type="hidden" name="mode" value="1">    
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="nom" placeholder="Entrez votre nom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="prenom" placeholder="Entrez votre prénom">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="email" placeholder="Entrez votre email">
        </div>

        <div class="formulaire pg-2 hidden">
                          <label for="salle">Unité de travail (salle):</label>
                          <select id="salle" name="salle" class="salle">
                            <option selected>Choisir...</option>
                            <?php foreach ($salles as $salle): ?>
                            <option value="<?= $salle['salle'] ?>"><?= $salle['salle'] ?></option>
                            <?php endforeach; ?>
                          </select>
                
                          <label for="lieu">Localisation:</label>
                          <input type="text" class="lieu" id="lieu" name="emplacement_precis" placeholder="Précision spaciale dans la pièce">
                            
                          <label for="situation">Situation dangereuse:</label>
                            
                          <input type="text" class="situation" id="situation" name="precis" placeholder="Donner une Précision (ex:Interrupteur côté porte...)">
                
                          <label for="famille">Famille de risque:</label>
                          <select id="famille" name="famille" class="famille">
                            <option selected>Choisir...</option>
                            <?php foreach ($familles as $famille): ?>
                            <option value="<?= $famille['famille'] ?>"><?= $famille['famille'] ?></option>
                            <?php endforeach; ?>
                          </select>
        
        </div>
        <div class="formulaire pg-3 hidden">
        <div class="block-1">
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
                            <div class="block-2">
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
                            </div>
                            
        </div>
        <div class="formulaire pg-4 hidden">
          <h3>Photos</h3>
          <input type="file" name='files[]' multiple>
        </div>
        <div class="back-pg">
        <button class="active" id="back">🡰 Retour à l'accueil</button>
        </div>
        <div class="nav-pg">
            <span class="pg pg-selected" id="pg1"></span>
            <span class="pg" id="pg2"></span>
            <span class="pg" id="pg3"></span>
            <span class="pg" id="pg4"></span>
        </div>

        <div class="next-pg">
        <button id="next" type="submit" name="submit">Suivant 🡲</button>
        </div>
        </form>  
    </div>
    <script src="scripts/form_scroll.js"></script>
    <script src="scripts/verif_form.js"></script>
</body>
</html>