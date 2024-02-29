<?php

session_start();
// Inclure FPDF
require_once('../vendor/fpdf/fpdf.php');

// Inclure le modèle
require_once('../model/modele.php');

// Fonction pour générer le PDF en utilisant l'ID du risque
function genererPDF($id_risque) {
    // Récupérer les informations du risque en fonction de son ID
    $risque = recuperer_infos_risque_par_id($id_risque);

    // Créer une instance FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Écrire le contenu dans le PDF
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Informations du risque', 0, 1, 'C');
    $pdf->Ln(10); // Saut de ligne

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 10, 'Nom : ' . $risque['nom'], 0, 1);
    $pdf->Cell(0, 10, 'Prenom : ' . $risque['prenom'], 0, 1);
    $pdf->Cell(0, 10, 'Email : ' . $risque['email'], 0, 1);
    $pdf->Cell(0, 10, 'Etat : ' . $risque['etat'], 0, 1);
    $pdf->Cell(0, 10, 'Date de creation : ' . $risque['date_creation'], 0, 1);
    $pdf->Cell(0, 10, 'Date de derniere modification : ' . $risque['date_derniere_modification'], 0, 1);
    // Ajoutez d'autres informations du risque selon vos besoins

    // Nommer le fichier PDF et le télécharger
    $pdf->Output('risque.pdf', 'D');

    // Arrêter l'exécution du script après l'envoi du PDF
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