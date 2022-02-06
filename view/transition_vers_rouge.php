<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<?= $input->texte_transition_vers_rouge ?>	

	<br />
	<br />

	<a href="../index.php?action=estimation" title="commencer" class="button-59">Commencer</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
