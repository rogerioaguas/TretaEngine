<?php
function criarCookie($name,$tempo,$path,$local,$secure)
{
	if($_COOKIE[$name] == $name)
	{
			
	}

	$final = $_COOKIE['todosjuntosOficialReferencia'].";".$id."-".$ref."-".date("Y-m");
	setcookie("todosjuntosOficialReferencia",$final,time()+2596000,"/",".todosjuntos.blog.br","0");

}
