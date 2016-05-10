<?php
/**
 * Iniciar uma form
 * 
 * @param String $action
 * @param String $method (null) 
 * @param String $id (null) 
 * @param Array $attributes (null)
 * 
 *
 * @uses startForm("A‹o","Metodo","id",array("enctype"=>"multipart/form-data","style"=>array("background"=>"#f00","color"=>"#fff")))
 */
function startForm($action,$method = null,$id = null,array $attributes = null)
{
	$id = !isset($id)?'':"id='".$id."'";
	$method = !isset($id)?"method='GET'":"method='".$method."'";

	if(is_array($attributes))
	{
		foreach ($attributes as $ind => $val)
		{
			if($ind == "style" && is_array($val))
			{
				foreach ($val as $style => $valStyle)
				{
					$estilo[] = $style.":".$valStyle."";

				}
			}
			else
			{
				$campo[] = $ind."='".$val."'";
			}
		}
		
		$attributes = is_array($campo)?implode(" ", $campo):"";
		$attributes .= isset($estilo)?" style=".implode(";", $estilo):null;
		
	}
	return "<form ".$id." ".$method." action='".$action."' ".$attributes.">";

}
/**
 * @uses Fecha o form
 */
function closeForm()
{
	return "</form>";
}

/**
 * @uses Cria um input 
 */

function makeInput($name,$id = null,$type = null)
{
	$type = !isset($type)?"type = 'text'":"type = '".$type."'";
	$id = !isset($id)?'':"id='".$id."'";
	
	return "<input ".$type." ".$id."/>";
}

/*
 * Cria um button
 */
function makeButton($title,$id = null)
{
	$id = !isset($id)?'':"id='".$id."'";
	
	return "<button ".$id.">".$title."</button>";
}