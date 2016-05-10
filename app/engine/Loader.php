<?php
class Loader
{
		
	function model($nome)
	{
		if(file_exists(MODELS .$nome.'_Model.php'))
		{
		include_once MODELS .$nome.'_Model.php';
		$nome = $nome."_Model";
		return new $nome();
		}
		
		
	}
	
	function helpers($nome)
	{
		if(file_exists(HELPERS .$nome."_Helper.php"))
		{
			include_once HELPERS .$nome."_Helper.php";
		}
	}
	function lib($nome)
	{
		if(file_exists(LIB .$nome."_Helper.php"))
		{
			include_once LIB .$nome."_Helper.php";
		}
	}
}