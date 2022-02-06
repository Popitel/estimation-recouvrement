<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<img class="image"
		src=<?= "./public/images/" . $image_name . ".png"?>
		alt="Recouvrement à estimer"
		height="500"
		width="500"
		>
	<br />
	<form action="index.php" method="post">
		<p>
		<label for="valeur_estimé"> Recouvrement estimé: </label>
		<input 
			type="text" 
			name="valeur_estimée" 
			id="valeur_estimée" 
			min="0"
			max="100"
			pattern="^\d{0,2}(\(.|,)\d{0,2})?$"
			required>
		%
		<br />
		<br />
		<input type="submit" value="Envoyer" class="button-59">
		</p>
	</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
