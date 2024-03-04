<?php

session_start();
// Inclure FPDF
require_once('../vendor/autoload.php');

// Inclure le modèle
require_once('../model/modele.php');

// Fonction pour générer le PDF en utilisant l'ID du risque
function genererPDF($id_risque) {
    // Récupérer les informations du risque en fonction de son ID
    $risque = recuperer_infos_risque_par_id($id_risque);

    // Créer une instance FPDF
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output();
    exit;
}

// Vérifier si l'ID du risque est défini dans la requête POST
if(isset($_POST['id_risque'])) {
    // Appeler la fonction pour générer le PDF avec l'ID du risque passé en paramètre
    genererPDF($_POST['id_risque']);
} else {
    // Redirection si l'ID du risque n'est pas défini
    header('Location: ../view/vue_utilisateur.php');
    exit; // Arrêter l'exécution du script après la redirection
}
?>