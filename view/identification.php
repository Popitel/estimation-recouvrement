<?php
require_once './public/textes/input_text.php';

ob_start();

echo "<h1>" . Input::S_TITRE_PAGE_IDENTIFICATION . "</h1><br>";

echo "<a href='index.php?action=questionnaire' title='jamais participé' class='button-59' role='button'>" . Input::S_TEXTE_BOUTON_JAMAIS_PARTICIPE . "</a><br><br>";

echo "<form action='index.php' method='post'><p><label for='identifiant'>" . Input::S_TEXTE_PAGE_IDENTIFICATION . "</label><br><br>";
echo "<input type='text' name='identifiant' id='identifiant' required> ";
echo "<input type='submit' value=" . Input::S_TEXTE_BOUTON_DEJA_PARTICIPE . " class='button-59'></p></form>";

$content = ob_get_clean();
require('template.php');
