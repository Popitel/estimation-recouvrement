<?php

function creerInputRadio($a_valeur, $name)
{
	$sHtml = "";

	$first = true;
	foreach($a_valeur as $value => $label)
	{
		$sHtml .= "<input type='radio' name='" . $name . "' id='" . $value . "' value='" . $value . "'" . ($first ? ' required' : '') . ">&nbsp;";
		$sHtml .= "<label for='" . $value . "'>" . $label . "</label><br>";

		if($first) $first = false;
	}

	return $sHtml;
}

function creerSelect($a_valeur, $name)
{
	$sHtml = "<select name='" . $name . "' id='" . $name . "'>";
	foreach($a_valeur as $value => $label) $sHtml .= "<option value='" . $value . "'>" . $label . "</option>";
	$sHtml .= "</select>";

	return $sHtml;
}