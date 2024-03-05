<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risque</title>
    <link rel="stylesheet" href="../styles/pdf.css">
</head>
<body>
    <div class="bloc-titre">
    <div class="titre-fiche">
        <p>FICHE D'EVALUATION D'UN RISQUE</p>
    </div>
    <div class="num-fiche">
        <p>N°</p>
    </div>
    <div class="etablissement">
    <p>Etablissement : LGT_LP_Voillaume</p>
    </div>
    <div class="logo-voillaume">
        <img src="../assets/logo_voillaume.jpg">
    </div>
    </div>
    <div class="tab-1">
        <table>
            <tr>
                <td class="first">Unité de travail :</td>
                <td></td>
            </tr>
            <tr>
                <td class="first">Localisation :</td>
                <td></td>
            </tr>
            <tr>
                <td class="first">Activité de travail ou tâche :</td>
                <td></td>
            </tr>
            <tr>
                <td class="first">Situation dangereuse :</td>
                <td></td>
            </tr>
            <tr>
                <td class="first">Famille de risque :</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="bloc-photo">
        <div class="photo-titre">
            <p>PHOTO DU RISQUE</p>
        </div>
        <div class="photo">
            <img>
        </div>
    </div>
    <div class="midlign"></div>
    <div class="tab-2">
        <table>
            <tr class="head">
                <td class="info" colspan=2>Pour chaque ligne, évaluez en informant par un "X" une case de 0 à 4</td>
                <td class="niveau">0</td>
                <td class="niveau">1</td>
                <td class="niveau">2</td>
                <td class="niveau">3</td>
                <td class="niveau">4</td>
                <td class="info">0 étant la valeur la plus faible, 4 étant la valeur la plus élevée</td>
            </tr>
            <tr>
                <td rowspan=3>Personnes exposées</td>
                <td>Aucun personnel EN concerné</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Tous les personnels EN sont concernés</td>
            </tr>
            <tr>
                <td>Aucun ATTEE concerné</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Tous les ATTEE sont concernés</td>
            </tr>
            <tr>
                <td>Aucun élève concerné</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Tous les élèves sont concernés</td>
            </tr>
            <tr>
                <td rowspan=4>Gravité</td>
                <td>Aucune blessure</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Blessures graves ou décès</td>
            </tr>
            <tr>
                <td>Aucune maladie</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Maladie mortelle</td>
            </tr>
            <tr>
                <td>Aucune pénibilité physique</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Très grande pénibilité physique</td>
            </tr>
            <tr>
                <td>Aucune pénibilité mentale</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Très grande pénibilité mentale</td>
            </tr>
            <tr>
                <td>Probabilité</td>
                <td>Nulle</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>très probable</td>
            </tr>
            <tr>
                <td rowspan=2>Résolution de la situation</td>
                <td>Apparemment impossible à régler</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Apparemment très simple à régler</td>
            </tr>
            <tr>
                <td>Apparemment très coûteux à régler</td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td class="niveau"></td>
                <td>Apparemment très peu coûteux à régler</td>
            </tr>
        
        </table>
    </div>
    <div class="pied">
        <div>
            <p>Fait le : <span id="date-risque"></span></p>
        </div>
        <div>
            <p>Par : <span id="emmetteur"></span></p>
        </div>
        <div>
            <p>Total évaluation : <span id=""></span><span id="bareme">/40<span></p>
        </div>
    </div>
</body>
</html>