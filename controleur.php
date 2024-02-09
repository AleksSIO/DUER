<?php
session_start();
$mode=$_POST["mode"];
$action=$_GET["action"];

include 'modele.php';

switch ($mode) {

	case 1:

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$salle=$_POST['salle'];
		$emplacementPrecis=$_POST['emplacement_precis'];
		$situationDangereuse=$_POST['precis'];
		$FamilleRisque=$_POST['famille'];
		$tousLesPersonnelsEN=$_POST['tous_les_personnels_en'];
		$tousLesAttee=$_POST['tous_les_ATTEE'];
		$tousLesEleves=$_POST['tous_les_eleves'];
		$blessureGraves=$_POST['blessures'];
		$maladiesMortelles=$_POST['maladies'];
		$penibilitePhysique=$_POST['penibilite_physique'];
		$penibiliteMentale=$_POST['penibilite_mentale'];
		$probabilite=$_POST['probabilite'];
		$complexiteDeResolution=$_POST['complexite_de_resolution'];
		$solutionOnereuse=$_POST['solution_onereuse'];
		$images=$_POST['file'];

		if(    empty($nom) 
			&& empty($prenom) 
			&& empty($email)
			&& empty($salle) 
			&& empty($tousLesPersonnelsEN) 
			&& empty($tousLesAttee) 
			&& empty($tousLesEleves) 
			&& empty($blessureGraves) 
			&& empty($maladiesMortelles)
			&& empty($penibilitePhysique)
			&& empty($penibiliteMentale)
			&& empty($probabilite)
			&& empty($complexiteDeResolution)
			&& empty($solutionOnereuse)	
		)  // le signe && signifie OU
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else 
		{
			$Id_Utilisateur = utilisateur($nom, $prenom, $email);
			$Id_Unite_de_travail = inserer_unite_de_travail(NULL, $salle);
			$Id_solution_de_la_situation=inserer_solution_de_la_situation($complexiteDeResolution, $solutionOnereuse, NULL);
			$Id_Situation_dangereuse=inserer_situation_dangereuse(NULL, $situationDangereuse);
			$Id_Probabilite=inserer_probabilite($probabilite);
			$Id_personne_exposees=inserer_personne_exposees(NULL, $tousLesPersonnelsEN, $tousLesAttee, $tousLesEleves);
			$Id_Localisation=inserer_localisation(NULL, $emplacementPrecis);
			$Id_gravite=inserer_gravite(NULL,$blessureGraves, $maladiesMortelles, $penibilitePhysique, $penibiliteMentale);
			$Id_Famille_de_risque=inserer_famille_de_risque(NULL, $FamilleRisque);
			$Id_Photos=inserer_image(NULL, $images);

			$date_creation=date('Y-m-d H:i:s');
			$date_derniere_modification=date('Y-m-d H:i:s');

			$etat="EN_COURS";
			
			inserer_risque( $etat, $date_creation, $date_derniere_modification, $Id_Photos, $Id_Utilisateur, $Id_Situation_dangereuse, $Id_Probabilite, $Id_Famille_de_risque, $Id_Localisation, $Id_Unite_de_travail, $Id_gravite, $Id_personne_exposees, $Id_solution_de_la_situation);

			$nb_lignes=1;
			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;  // le signe && signifie OU
			
		
	
	case 2: //verification de la connexion

		$mail = $_POST['mail'];
		$pass = $_POST['password'];

		if(empty($mail) && empty($pass)) // le signe && signifie OU
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			$nb_lignes=verif_connexion($mail, $pass);
			if($nb_lignes > 0) 
			{
				// cette variable indique que l'authentification a réussi
				header("Location:vue_formulaire.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee.";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}	
		}	
				
		break;





}
?>
