<?php

class Input
{
	// NOM DES FICHIERS EXCEL A LIRE

	const S_GREEN_SHEET_NAME = "sample_order_quadrats_green.csv";
	const S_RED_SHEET_NAME = "sample_order_quadrats_red.csv";

	// DIFFERENTS TEXTES A AFFICHER 

	// Titre de l'onglet
	//
	const S_TITRE_PAGE_GLOBALE = "Estimation recouvrement";

	//Page d'accueil

	const S_TITRE_ACCEUIL = "Etude sur l’estimation du taux de recouvrement en botanique";

	const S_TEXTE_ACCEUIL = "Vous allez participer à une étude sur l’estimation des taux de recouvrement en botanique.<br><br>En cliquant sur le bouton « Participer » ci-dessous, vous allez être dirigé vers un questionnaire, puis vous aurez deux séries d’estimations à réaliser. <br><br>Pour chaque estimation, un quadrat virtuel vous sera présenté et vous devrez estimer la proportion de la surface du carré couverte par les points de couleur. La réponse est à donner en pourcentage, et les nombres à virgule sont acceptés jusqu’à la 2ème décimale. La durée de l’exercice dépend de votre vitesse de réponse, mais prévoyez d’avoir 20 minutes devant vous pour pouvoir le faire dans de bonnes conditions. Veuillez à faire cet exercice sur un écran de dimensions supérieures ou égales à 15.";

	const S_TEXTE_BOUTON_ACCEUIL = "Participer";

	// Page d'identification

	const S_TITRE_PAGE_IDENTIFICATION = "Avez-vous déjà participé ?";
	const S_TEXTE_BOUTON_JAMAIS_PARTICIPE = "Je n'ai jamais participé";
	const S_TEXTE_BOUTON_DEJA_PARTICIPE = "Envoyer mon identifiant";
	const S_TEXTE_PAGE_IDENTIFICATION = "Si vous avez déjà participé entrez simplement l'identifiant qui vous à été donné puis cliquez sur le bouton ci-dessous.";

	// Page de transition avant le départ

	const S_TEXTE_AVANT_DEPART = "Vous allez maintenant commencer la 1ère série d’estimations, où vous devrez estimer le recouvrement de 20 quadrats virtuels.<br><br> Vous avez le temps que vous voulez pour prendre les mesures, et le temps est enregistré. Les quadrats ne s’enchaînent pas automatiquement, après chaque estimation vous devrez cliquer sur un bouton pour passer au quadrat suivant. <br><br>Cliquez sur « commencer » quand vous êtes prêt.";

	// Page d'erreur d'identification
	
	const S_TEXTE_WRONG_ID = "L'identifiant que vous avez donné n'existe pas";
	
	// Page de transition avant la série de rouges
	
	const S_TEXTE_BOUTON_TRANSITION = "Prochaine estimation";
	const S_TEXTE_BOUTON_TRANSITION_ROUGE = "Commencer la série suivante";
	const S_TEXTE_TRANSITION_ROUGE = "Vous allez maintenant commencer la 2ème série d’estimations, où vous devrez estimer le recouvrement de 15 quadrats virtuels.<br> Vous avez le temps que vous voulez pour prendre les mesures, et le temps est enregistré. Les quadrats ne s’enchaînent pas automatiquement, après chaque estimation vous devrez cliquer sur un bouton pour passer au quadrat suivant. Cliquez sur « commencer » quand vous êtes prêt.";

	// Page de remerciements
	
	const S_TEXTE_REMERCIEMENTS = "Je vous remercie d’avoir participé à cette expérimentation ! – Jan Perret";
	
	const S_TEXTE_REMERCIEMENTS2 = "Votre identifiant est le suivant. Veuillez le noter afin de pouvoir le fournir lors du questionnaire de début si vous voulez participer plusieurs fois à l’expérience.";
	const S_TEXTE_BOUTON_RECOMMENCER = "Recommencer";

/*************** Questionnaire du début ***************/	
	const S_QUESTION_GENRE = "Veuillez indiquer ce qui décrit le mieux votre genre :";
	const S_QUESTION_ANNEE = "Votre année de naissance :";
	const S_QUESTION_MOIS = "Votre mois de naissance :";
	const S_QUESTION_DALTONIEN = "Etes-vous daltonien ? ";
	const S_QUESTION_ETUDES = "Votre niveau d'études :";
	const S_QUESTION_PAYS = "Votre pays de résidence actuel ?";
	const S_QUESTION_PRATIQUE_BOTANIQUE = "Avez-vous déjà pratiqué la botanique ?";
	const S_QUESTION_NIVEAU_BOTANIQUE = "Si oui, quel est votre niveau de pratique ?";
	const S_QUESTION_ANNEE_BOTANIQUE = "Si oui, depuis combien d'années pratiquez-vous ?";
	const S_QUESTION_RECOUVREMENT = "Avez-vous déjà estimé des taux de recouvrement sur le terrain ?";
	const S_QUESTION_ECHELLE_RECOUVREMENT = "Si oui, avec quelle échelle de recouvrement ?";

/*************** Tableaux du questionnaire de début ***************/
	const A_LABEL_OUI_NON = array(
		true => 'Oui',
		false => 'Non'
	);

	const A_LABEL_GENRE_PAR_ID = array(
		'femme' => 'Femme',
		'homme' => 'Homme',
		'nonbinaire' => 'Non binaire',
		'secret' => 'Je préfère ne pas le dire'
	);

	const A_LABEL_MOIS_PAR_ID = array(
		'01' => 'Janvier',
		'02' => 'Fevrier',
		'03' => 'Mars',
		'04' => 'Avril',
		'05' => 'Mai',
		'06' => 'Juin',
		'07' => 'Juillet',
		'08' => 'Août',
		'09' => 'Septembre',
		'10' => 'Octobre',
		'11' => 'Novembre',
		'12' => 'Décembre'
	);

	const A_LABEL_ETUDES_PAR_ID = array(
		'aucune' => 'Aucune étude',
		'bac' => 'Bac',
		'bac+2' => 'Bac +2',
		'bac+3' => 'Bac +3',
		'bac+4' => 'Bac +4',
		'bac+5' => 'Bac +5',
		'bac+8' => 'Bac +8'
	);

	const A_LABEL_NIVEAU_BOTANIQUE_PAR_ID = array(
		1 => '1 (débutant)',
		2 => '2',
		3 => '3',
		4 => '4',
		5 => '5 (expert)'
	);

	const A_LABEL_ECHELLE_RECOUVREMENT_PAR_ID = array(
		'net' => 'Recouvrement net',
		'braun' => 'Braun-Blanquet',
		'pin' => 'Pin point'
	);

/*************** Questionnaire de fin ***************/	
	const S_TITRE_QUESTIONNAIRE_FIN = "Questionnaire de fin";
	const S_QUESTION_CONFIANCE = "Quelle confiance avez-vous dans vos estimations ?";
	const S_QUESTION_QUELS_CAS = "Dans quel(s) cas avez-vous trouvé qu’il était plus difficile d’estimer le recouvrement ?";
	const S_QUESTION_TERRAIN = "Si vous avez déjà estimé des taux de recouvrement sur le terrain, comment pensez-vous que sont vos estimations sur les quadrats virtuels par rapport à vos estimations sur le terrain ?";
	const S_MAIL = "Si vous souhaitez être informé des résultats de l’étude, vous pouvez indiquer ici votre adresse mail.";

/*************** Tableaux du questionnaire de fin ***************/
	const A_LABEL_NIVEAU_CONFIANCE = array(
		1 => '1 (aucune confiance)',
		2 => '2',
		3 => '3',
		4 => '4',
		5 => '5 (mes estimations sont exactes)'
	);

	const A_LABEL_QUELS_CAS = array(
		'sais_pas' => 'Je ne sais pas',
		'vert' => 'Points verts',
		'rouge' => 'Points rouges',
		'faible' => 'Recouvrements faibles',
		'moyen' => 'Recouvrements moyens',
		'fort' => 'Recouvrements forts',
		'no_agreg' => 'Aucune agrégation',
		'agreg_faible' => 'Agrégation faible',
		'agreg_moyenne' => 'Agrégation moyenne',
		'agreg_forte' => 'Agrégation forte'
	);

	const A_LABEL_TERRAIN = array(
		'moins' => 'Moins précises',
		'autant' => 'Aussi précises',
		'plus' => 'Plus précises'
	);
}

