<?php
session_start();
require_once('./outils/outils.php');
require_once('./public/textes/input_text.php');
require_once('./model/UserInfos.php');
require_once('./model/model.php');
require_once('./model/SheetReader.php');
require_once('./controller/controller.php');
require './vendor/autoload.php';
$controller = new Controller;

if(isset($_GET['action'])) {
    if($_GET['action'] == 'identification') {
	$controller->identification();
    }
    elseif($_GET['action'] == 'questionnaire') {
	$controller->remplir_questionnaire();
    }
    elseif($_GET['action'] == 'estimation') {
	$controller->estimation();
    }
}
elseif(isset($_POST['genre']))
{
	$controller->reponse_questionnaire_debut();
}
elseif(isset($_POST['valeur_estimée']) && $_POST['valeur_estimée'] != -1)
{
	$controller->enregistrer_estimation();
}
elseif(isset($_POST['identifiant']))
{
	$controller->retrouver_identifiant();
}
elseif(isset($_POST['niveau_confiance']))
{
	$controller->reponse_questionnaire_fin();
}
else {
    $controller->accueil();
}
