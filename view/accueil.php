<?php
require_once './public/textes/input_text.php';

ob_start();

echo "<h1>" . Input::S_TITRE_ACCEUIL . "</h1>" . Input::S_TEXTE_ACCEUIL;
echo "<br><br><br>";
echo "<a href='index.php?action=identification' title='Cliquez pour participer' class='button-59' role='button'>" . Input::S_TEXTE_BOUTON_ACCEUIL . "</a>";

$content = ob_get_clean();
require('template.php');
