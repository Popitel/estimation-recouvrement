<?php

require_once './public/textes/input_text.php';

ob_start(); 

echo "<h1>" . Input::S_TITRE_QUESTIONNAIRE_FIN . "</h1><br>";	

echo "<form action='../index.php' method='post'><p><fieldset>";

echo Input::S_QUESTION_CONFIANCE . "<br>";
echo creerInputRadio(Input::A_LABEL_NIVEAU_CONFIANCE, 'niveau_confiance', true);
echo "<br>";

echo Input::S_QUESTION_QUELS_CAS . "<br>";
echo creerInputRadio(Input::A_LABEL_QUELS_CAS, 'quels_cas', true);
echo "<br>";

echo Input::S_QUESTION_TERRAIN . "<br>";
echo creerInputRadio(Input::A_LABEL_TERRAIN, 'terrain', true);
echo "<br>";
			
echo "<label for='mail'>" . Input::S_MAIL . "</label><input type='text' name='mail' id='mail'><br></fieldset><br><br><input type='submit' value='Envoyer' class='button-59'>";
	
echo "</p></form>";

$content = ob_get_clean();
require('template.php');
