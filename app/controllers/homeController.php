<?php
class Home extends Controller
{
	
	protected $noticia;
	
	function __construct() {
		parent::__construct();
		 
		$this->noticia = $this->loader->model("Noticias");
		
		$this->loader->helpers("URL");
		$this->loader->helpers('Form'); 
	
	}
	
	
	public function index($id = null)
	{

		echo $id;
		$dados[] = $this->noticia->helloWorldModel();
		
		$this->view("home/index",$dados);
	}
	
	
	
}