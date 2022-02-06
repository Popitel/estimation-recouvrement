<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<?= $input->texte_wrongId ?>	

	<br />

	<a href="../index.php?action=identification" title="retour" class="button-59">Retour</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
