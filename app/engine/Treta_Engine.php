<?php
class Treta_Engine
{

	public $loader;
	
	private $url;
	private $explode;
	public $controller;
	public $action;
	public $params;
	
	public function __construct()
	{
		$this->loader = new Loader();
		
		$this->setUrl();
		$this->setExplode();
		$this->setController();
		$this->setAction();
		$this->setParams();
		
		
	}

	private function setUrl()
	{
		
		$server = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		
		//echo "<br /><br /><br /><br />";
		
		$explodeServe = explode("/",$server);
		
		if(end($explodeServe) == "index.php")
		{
			$this->url = "home/index";
		}
		else
		{
			$campos = null;
			for($i==0;$i<count($explodeServe);$i++)
			{
				if($flag == true)
				{
					$campos .= $explodeServe[$i]."/";
				}
				if($explodeServe[$i] == "index.php")
				{
					$flag = true;	
				}
			}
			$this->url = $campos;
		}
		
		//$_GET['url'] = !isset($_GET['url'])?"home/index":$_GET['url'];
		//$this->url = $_GET['url'];

	}

	private function setExplode()
	{
		$this->explode = explode("/",$this->url);
	}

	private function setController()
	{
		$this->controller = $this->explode[0];

	}

	private function setAction()
	{
		$ac = (!isset($this->explode[1])||$this->explode[1] == null?"index":$this->explode[1]);
		$this->action = $ac;

	}

	private function setParams()
	{
		unset($this->explode[0],$this->explode[1]);
		if(end($this->explode) == null)
		{
			array_pop($this->explode);
		}
		if(count($this->explode) == 1)
		{
			$this->params = $this->explode[2];
		}
		else
		{
			$i = 0;
			if(!empty($this->explode))
			{
				foreach($this->explode as $val)
				{
					if($i%2 == 0)
					{
						$ind[] = $val;
					}
					else
					{
						$value[] = $val;
					}
					$i++;
				}
					
			}
			else
			{
				$ind = array();
				$value = array();
			}
			if(count($ind) == count($value) && !empty($value))
			{
				$this->params = array_combine($ind, $value);
			}
			else
			{
				$this->params = array();
			}
		}

	}

	public function getParams($id = null)
	{
		if(is_array($this->params))
		{
			
			return $this->params[$id];
		}
		else
		{
			return $this->params;
		}

	}

	public function run()
	{
		$controller_path = CONTROLLERS . $this->controller . "Controller.php";
		if(!file_exists($controller_path))
		{
			die('Houve um error.');
		}
		include_once $controller_path;
		$app = new $this->controller();
		if(!method_exists($app, $this->action))
		{
				
			$action = "index";
			$app->$action($this->action);
		}
		else
		{
			$action = $this->action;
			$app->$action();
		}
	}

}