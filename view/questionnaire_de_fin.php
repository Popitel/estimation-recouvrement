<?php
require_once './public/textes/input_text.php';
$input = new Input;
ob_start(); ?>
	<h1> <?= $input->titre_questionnaire_de_fin ?> </h1>	

	<br />

	<form action="../index.php" method="post">
		<p>
		
		<fieldset>
			<?= $input->question_confiance ?><br />
			<input type="radio" name="niveau_confiance" value="1" id="1" required><label for="1">1 (aucune confiance)</label><br/>
			<input type="radio" name="niveau_confiance" value="2" id="2"><label for="2">2</label><br/>
			<input type="radio" name="niveau_confiance" value="3" id="3"><label for="3">3</label><br/>
			<input type="radio" name="niveau_confiance" value="4" id="4"><label for="4">4</label><br/>
			<input type="radio" name="niveau_confiance" value="5" id="5"><label for="5">5 (mes estimations sont exactes)</label><br/>
			
			<br />
			
			<?= $input->question_quels_cas ?><br />
			<input type="radio" name="quels_cas" value="sais_pas" id="sais_pas" required><label for="sais_pas">Je ne sais pas</label><br/>
			<input type="radio" name="quels_cas" value="vert" id="vert"><label for="vert">Points verts</label><br/>
			<input type="radio" name="quels_cas" value="rouge" id="rouge"><label for="rouge">Points rouges</label><br/>
			<input type="radio" name="quels_cas" value="faible" id="faible"><label for="faible">Recouvrements faibles</label><br/>
			<input type="radio" name="quels_cas" value="moyen" id="moyen"><label for="moyen">Recouvrements moyens</label><br/>
			<input type="radio" name="quels_cas" value="fort" id="fort"><label for="fort">Recouvrements forts</label><br/>
			<input type="radio" name="quels_cas" value="no_agreg" id="no_agreg"><label for="no_agreg">Aucune agrégation</label><br/>
			<input type="radio" name="quels_cas" value="agreg_faible" id="agreg_faible"><label for="agreg_faible">Agrégation faible</label><br/>
			<input type="radio" name="quels_cas" value="agreg_moyenne" id="agreg_moyenne"><label for="agreg_moyenne">Agrégation moyenne</label><br/>
			<input type="radio" name="quels_cas" value="agreg_forte" id="agreg_forte"><label for="agreg_forte">Agrégation forte</label><br/>
			
			<br/>
			
			<?= $input->question_terrain ?><br />
			<input type="radio" name="terrain" value="moins" id="moins" required><label for="moins">Moins précises</label><br/>
			<input type="radio" name="terrain" value="autant" id="autant" required><label for="autant">Aussi précises</label><br/>
			<input type="radio" name="terrain" value="plus" id="plus" required><label for="plus">Plus précises</label><br/>
			
			<br/>
			
			<label for="mail"> <?= $input->mail ?> </label>
			<input type="text" name="mail" id="mail"><br /> 			
			
		</fieldset>
		<br />
		<br />

		<input type="submit" value="Envoyer" class="button-59">
		</p>
	</form>
	<?php 
	var_dump($_SESSION['images_names']);
	PHP_EOL;
	PHP_EOL;
	var_dump($_SESSION['valeurs']);
	PHP_EOL;
	PHP_EOL;
	var_dump($_SESSION['debuts']);
	PHP_EOL;
	PHP_EOL;
	var_dump($_SESSION['fins']);
	?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
