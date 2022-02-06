<?php

require_once('./public/textes/input_text.php');

ob_start();

echo "<h1>Questionnaire</h1><form action='index.php' method='post'><p><fieldset>";

echo Input::S_QUESTION_GENRE . "<br>";
echo creerInputRadio(Input::A_LABEL_GENRE_PAR_ID, 'genre');
echo "<input type='radio' name='genre' value='autre' id='autre'>&nbsp;";
echo "<label for='autre'>Autre (à préciser)</label>&nbsp;";
echo "<input type='text' name='genreAutre' id='genreAutre'><br><br>";

echo "<label for='annee_naissance'>" . Input::S_QUESTION_ANNEE . "</label>&nbsp;";
echo "<input type='number' name='annee_naissance' id='annee_naissance' min=1911 max=2021 required><br>";

echo "<label for='mois_naissance'>" . Input::S_QUESTION_MOIS . "</label>&nbsp;";
echo creerSelect(Input::A_LABEL_MOIS_PAR_ID, 'mois_naissance');
echo "<br><br>";

echo Input::S_QUESTION_DALTONIEN . "<br>";
echo creerInputRadio(Input::A_LABEL_OUI_NON, 'daltonien');
echo "<br>";

echo Input::S_QUESTION_ETUDES . "<br>";
echo creerInputRadio(Input::A_LABEL_ETUDES_PAR_ID, 'niveau_etude');
echo "<br>";

echo "<label for='pays'>" . Input::S_QUESTION_PAYS . "</label>&nbsp;";
echo "<select name='pays'>";
include('./public/textes/liste_pays.php');
echo "</select>";

echo "</fieldset><br><br><fieldset>";

echo Input::S_QUESTION_PRATIQUE_BOTANIQUE . "<br>";
echo creerInputRadio(Input::A_LABEL_OUI_NON, 'bota');
echo "<br>";

echo Input::S_QUESTION_NIVEAU_BOTANIQUE . "<br>";
echo creerInputRadio(Input::A_LABEL_NIVEAU_BOTANIQUE_PAR_ID, 'niveau_bota');
echo "<br>";

echo "<label for='annee_bota'>" . Input::S_QUESTION_ANNEE_BOTANIQUE . "</label>&nbsp;";
echo "<input type='number' name='annee_bota' id='annee_bota' min=0 max=99>";

echo "</fieldset><br><br><fieldset>";

echo Input::S_QUESTION_RECOUVREMENT . "<br>";
echo creerInputRadio(Input::A_LABEL_OUI_NON, 'recouvre');
echo "<br>";

echo Input::S_QUESTION_ECHELLE_RECOUVREMENT . "<br>";
echo creerInputRadio(Input::A_LABEL_ECHELLE_RECOUVREMENT_PAR_ID, 'echelle');
echo "<input type='radio' name='echelle' value='autre' id='autre'>&nbsp;";
echo "<label for='autre'>Autre (à préciser)</label>&nbsp;";
echo "<input type='text' name='echelleAutre' id='echelleAutre'>";

echo "</fieldset><br><br>";

echo "<input type='submit' value='Envoyer' class='button-59'>";

echo "</p></form>";

$content = ob_get_clean();
require('template.php');