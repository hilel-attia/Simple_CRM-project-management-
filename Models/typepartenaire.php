<?php
require_once __DIR__ . '/connect.php';
class typepartenaire extends connect{
	private $id=0;
	private $typepartenaire=0;
	
	public function __construct($param=array()){
		parent::__construct();
		if (isset($param['id']))
				$this->id=$param['id'];
		if (isset($param['typepartenaire']))
				$this->typepartenaire=$param['typepartenaire'];
	}

	public function Liste(){
		$rq = "SELECT * FROM typepartenaire";
		return $this->query($rq);
	}
	
	public function Get(){
		$rq = "SELECT * FROM typepartenire where id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->query($rq, $Parmas);
	}
	
	public function Supprimer(){
		$rq = "DELETE FROM typepartenaire where id=id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->execute($rq,$Parmas);
	}
	
}
?>