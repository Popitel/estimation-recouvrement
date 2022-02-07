<?php
require_once './public/textes/input_text.php';

ob_start();

echo Input::S_TEXTE_WRONG_ID . "<br><a href='../index.php?action=identification' title='retour' class='button-59'>Retour</a>";

$content = ob_get_clean();
require('template.php');
