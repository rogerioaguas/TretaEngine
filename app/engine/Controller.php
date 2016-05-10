<?php
class Controller extends Treta_Engine
{
	/**
	 *
	 * @param string $nome
	 * @param array $dados
	 * @param int $choose
	 * @uses Op›es choose: <br />1 (Header + Conteœdo + Footer)<br />2 (Header + Conteœdo)<br />3 (Conteœdo + Footer)
	 *
	 */
	private $post;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->post = $this->loader->model("Post");
		
		/*
		 *Modifica›es para Censored
		*
		*Atualizar Automaticamente
		*/
		//$dados = array("post_ativo"=>"1");
		//$this->post->update($dados,"post_date <='".date("Y-m-d H:i:s")."'");
		/*
		 * Fim
		*/

	}
	
	protected function view($nome,array $dados = null,$choose = 1)
	{
		/*
		 * Chama as views
		*/
		/*if(is_array($dados) && count($dados) > 0)
		 {
			
		extract($dados, EXTR_PREFIX_ALL , "pre");
			
		}*/
		
		switch($choose)
		{
			case 1:
				{

					$this->header($dados);
					include_once( VIEWS .$nome.".php");
					$this->footer($dados);
					break;
				}
			case 2:
				{
					$this->header($dados);
					include_once( VIEWS .$nome.".php");
					break;
				}
			case 3:
				{
					include_once( VIEWS .$nome.".php");
					$this->footer($dados);
					break;
				}
			case 4:
				{
					include_once( VIEWS .$nome.".php");

					break;
				}
			default:{
					
				$this->header($dados);
				include_once( VIEWS .$nome.".php");
				$this->footer($dados);
				break;
			}
		}
	}
	protected function header(array $dados = null)
	{
		/*
		 * chama header
		*/
		include_once(VIEWS . "header.php");
	}
	protected function footer(array $dados = null)
	{
		/*
		 * chama footer
		*/
		include_once(VIEWS . "footer.php");
	}
}