<?php
class Model extends Config
{
	protected $db;
	
	protected $table = "";
	
	public function __construct()
	{
		$this->db = new PDO("mysql:host=".$this->local.";dbname=".$this->dbname, $this->user, $this->pass);
	}
	
	public function insert(array $dados)
	{
		$campos = implode(", ", array_keys($dados));
		$valores = implode("', '",array_values($dados));
		
		$sql = "INSERT INTO ".$this->table."(".$campos.") VALUES('".$valores."')";
		$this->db->query($sql);	
	}
	
	public function read($where = null,$order = null,$limit = null)
	{
		$where = ($where != null ? "WHERE ".$where : "");
		$order = ($order != null ? "ORDER BY ".$order: "");
		$limit = ($limit != null ? "LIMIT ".$limit: "");
		$sql = "SELECT * FROM `".$this->table."` ".$where." ".$order." ".$limit."";		
		$q = $this->db->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q->fetchAll();
	}
	
	public function update(array $dados, $where = NULL)
	{
		foreach($dados as $ind => $val)
		{
			$campos[] = $ind." = `".$val."`";
		}
		$campos = implode(" , ", $campos);
		$where = $where != null?"WHERE ".$where:"";
		$sql = "UPDATE 	`".$this->table."` SET ".$campos." ".$where;
		$this->db->query($sql);
	}
	
	public function delete($where = null)
	{
		if($where != null)
		{
			$sql = "DELETE FROM `".$this->table."` WHERE ".$where;
			$this->db->query($sql);
		}	
		
	}
	
}