<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<p>
		<?= $input->texte_remerciements ?>
		<br />
		<br />
		<?= $input->texte_remerciements2 ?>
		<br />
		Identifiant : <?= $_SESSION['id'] ?>
	</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
