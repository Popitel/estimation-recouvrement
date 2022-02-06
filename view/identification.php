<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start() ?>
	<h1> <?= $input->titre_page_identification ?> </h1>
	
	<br />

	<a href="index.php?action=questionnaire" title="Cliquez pour acceder au questionnaire" class="button-59" role="button">
	Je n'ai jamais participé</a>

	<br />
	<br />

	<form action="index.php" method="post">
		<p>
		<label for="identifiant"> <?= $input->texte_page_identification ?> </label><br />
		<input type="text" name="identifiant" id="identifiant" required>
		<input type="submit" value="Envoyer mon identifiant" class="button-59">
		</p>
	</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
