<?php

class Controller
{
	public function accueil()
	{
		require('./view/accueil.php');
	}

	public function identification()
	{
		require('./view/identification.php');
	}

	public function remplir_questionnaire()
	{
		require('./view/questionnaire.php');
	}

	public function estimation()
	{
		$input = new Input;
		$page_title = $input->titre_page_global;
		$image_name = $this->getNextImageName();
		$_SESSION['debuts'][$_SESSION['image_index']] = date_create();
		
		require('./view/estimation.php');
	}

	public function getNextImageName()
	{
		$_SESSION['image_index'] = $_SESSION['image_index']+1;
		return $_SESSION['images_names'][$_SESSION['image_index']];
	}
	
	public function reponse_questionnaire_debut()
	{
		$id = $this->creation_profil();
		$this->creation_session($id);
		
		require('./view/avant_estimation.php');
	}

	public function creation_profil()
	{
		$user = new UserInfos();
		$user->genre = $_POST['genre'];
		if($_POST['genreAutre'] != "")
			$user->genre = $_POST['genreAutre'];
		$user->naissance = $_POST['annee_naissance'] . "-" . $_POST['mois_naissance'] . "-01";
		$user->dalt = $_POST['daltonien'];
		$user->etude = $_POST['niveau_etude'];
		$user->pays = $_POST['pays'];
		$user->niveau_bota = 0;
		$user->annee_bota = 0;
		if($_POST['bota'])
		{
			$user->niveau_bota = $_POST['niveau_bota'];
			$user->annee_bota = $_POST['annee_bota'];
		}
		$user->recouvre = $_POST['recouvre'];
		if($_POST['echelleAutre'] != "")
			$user->echelle = $_POST['echelleAutre'];
		else if($_POST['echelle'] != "")
			$user->echelle = $_POST['echelle'];
		else
			$user->echelle = "aucune";
		$model = new Model;
		$newId = $model->createUser($user);

		return $newId;
	}
	
	public function creation_session($id)
	{
		$_SESSION['id'] = $id;
		$model = new Model;
		$reader = new SheetReader;
		$_SESSION['images_names'] = $reader->getNextSerie();
		$_SESSION['nombre_de_vert'] = $reader->getGreenNumber();
		$reader->increaseCounters();
		
		$_SESSION['valeurs'] = array();
		$_SESSION['debuts'] = array();
		$_SESSION['fins'] = array();
		foreach($_SESSION['images_names'] as $name)
		{
			$_SESSION['valeurs'][] = -1;
			$_SESSION['debuts'][] = -1;
			$_SESSION['fins'][] = -1;
		}
		$_SESSION['image_index'] = -1;
		$_SESSION['num_serie'] = $model->getNextSerieNbForUser($_SESSION['id']);
	}

	public function enregistrer_estimation()
	{
		$_SESSION['valeurs'][$_SESSION['image_index']] = intval($_POST['valeur_estimée']);
		$_SESSION['fins'][$_SESSION['image_index']] = date_create();
		
		/* MODE DEVELOPPEMENT */
		/*
		$i = 0;
		foreach($_SESSION['images_names'] as $name)
		{
			$_SESSION['valeurs'][$i] = date_create();
			$_SESSION['debuts'][$i] = date_create();
			$_SESSION['fins'][$i] = date_create();
			$i++;
		}
		*/

		if($_SESSION['image_index'] == count($_SESSION['images_names'])-1)
		{
			require('./view/questionnaire_de_fin.php');
		}
		else if($_SESSION['image_index'] == $_SESSION['nombre_de_vert']-1)
		{
			require('./view/transition_vers_rouge.php');
		}
		else
		{
			require('./view/transition.php');
		}
	}

	public function retrouver_identifiant()
	{
		$model = new Model;
		if(isset($_POST['identifiant']))
		{
			if($model->idExist($_POST['identifiant']))
			{
				$this->creation_session($_POST['identifiant']);
				$identifiant_found = true;
			}
		}

		if($identifiant_found)
		{
			require('./view/avant_estimation.php');
		}
		else
		{
			require('./view/wrong_id.php');
		}
	}

	public function reponse_questionnaire_fin()
	{
		$model = new Model;
		$model->updateUserInfo($_SESSION['id'], "niveau_confiance", intval($_POST['niveau_confiance']));
		$model->updateUserInfo($_SESSION['id'], "plus_difficiles", $_POST['quels_cas']);
		$model->updateUserInfo($_SESSION['id'], "précision", $_POST['terrain']);
		if(isset($_POST['mail']) && strlen($_POST['mail']) > 0)
		{
			$model->updateUserInfo($_SESSION['id'], "email", $_POST['mail']);
		}
		
		for($i=0 ; $i<count($_SESSION['images_names']) ; $i++)
		{
			$esti = new Estimation;
			$esti->id = intval($_SESSION['id']);
			$esti->num = intval($i);
			$esti->serie = intval($_SESSION['num_serie']);
			$esti->nom = $_SESSION['images_names'][$i];
			$esti->debut = $_SESSION['debuts'][$i];
			$esti->fin = $_SESSION['fins'][$i];
			$esti->valeur = intval($_SESSION['valeurs'][$i]);
			$model->enregistrer_estimation($esti);
		}
		
		require('./view/remerciements.php');
	}
}
