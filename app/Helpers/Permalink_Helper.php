<?php
/**
 * 
 * @param Titulo String
 * 
 * @return o valor de string sem os carateres especiais e com '-' no local do espao
 * 
 */

function createPermalink($titulo)
{
	$string = trim($titulo);
	$string = preg_replace("/[^a-zA-Z0-9\s]/", "", $string);
	$string = str_replace(" ", "-", "$string");
	return strtolower($string);
}
