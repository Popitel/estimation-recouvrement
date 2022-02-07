<?php
require_once './public/textes/input_text.php';

ob_start();

echo "<a href='../index.php?action=estimation' title='estimation' class='button-59'>" . Input::S_TEXTE_BOUTON_TRANSITION . "</a>";

$content = ob_get_clean();
require('template.php');
