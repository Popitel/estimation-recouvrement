<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<a href="../index.php?action=estimation" title="estimation" class="button-59"> Passer au quadrat suivant </a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
