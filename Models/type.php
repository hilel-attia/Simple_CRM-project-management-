<?php
require_once __DIR__ . '/connect.php';
class type extends connect{
	private $id=0;
	private $type=0;
	
	public function __construct($param=array()){
		parent::__construct();
		if (isset($param['id']))
				$this->id=$param['id'];
		if (isset($param['type']))
				$this->type=$param['type'];
	}

	public function Liste(){
		$rq = "SELECT * FROM type";
		return $this->query($rq);
	}
	
	public function Get(){
		$rq = "SELECT * FROM type where id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->query($rq, $Parmas);
	}
	
	public function Supprimer(){
		$rq = "DELETE FROM type where id=id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->execute($rq,$Parmas);
	}
	
}
?>