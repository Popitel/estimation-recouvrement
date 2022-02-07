<?php
require_once './public/textes/input_text.php';

ob_start();

echo Input::S_TEXTE_TRANSITION_ROUGE . "<br><br><a href='../index.php?action=estimation' title='commencer' class='button-59'>" . Input::S_TEXTE_BOUTON_TRANSITION_ROUGE . "</a>";

$content = ob_get_clean();
require('template.php');
