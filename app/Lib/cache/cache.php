<?php
/*
 * Sistema de cache baseando em paginas staticas.
 * Exemplo: 
 * Tem um blog o o usuario n‹o quer ficar fazendo consulta 
 * no banco de dados para n‹o sobrecarregar o servidor
 * cria-se pagina staticas.
 * 
 * =======
 * Data:31/01/14
 * =======
 * Desenvolvido por Bruno Colombini
 */
class Cache
{
	private $script_start;
	
	public function createCache($diretorio,$arquivo,$nome)
	{
		$temp = file_get_contents($arquivo);
		
		if (!file_exists("app/".$diretorio)) 
		{
	    	mkdir("app/".$diretorio, 0777);
		}
		
		$file = fopen("app/".$diretorio."/".$nome.".html","w");
		fwrite($file, $temp);
		fclose($file);
	
	}
	
}