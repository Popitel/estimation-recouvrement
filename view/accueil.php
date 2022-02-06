<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<h1> <?= $input->titreAccueil ?> </h1>
	

		<?= $input->texteAccueil ?>
	
	<br />
	<br />
	<br />

	<a href="index.php?action=identification" title="Cliquez pour participer" class="button-59" role="button">Participer</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
