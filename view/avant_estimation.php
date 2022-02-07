<?php
require_once './public/textes/input_text.php';

ob_start();

echo Input::S_TEXTE_AVANT_DEPART;
echo "<br><br><a href='../index.php?action=estimation' title='estimation' class='button-59'>Commencer</a>";

$content = ob_get_clean();
require('template.php');
