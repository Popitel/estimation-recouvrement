<?php
require_once './public/textes/input_text.php';

ob_start();

echo "<p>" . Input::S_TEXTE_REMERCIEMENTS . "<br><br>" . Input::S_TEXTE_REMERCIEMENTS2 . "<br>Identifiant : " . $_SESSION['id'] . "</p>";
echo "<a href='index.php' title='participer' class='button-59' role='button'>" . Input::S_TEXTE_BOUTON_RECOMMENCER . "</a>";

$content = ob_get_clean();
require('template.php');
