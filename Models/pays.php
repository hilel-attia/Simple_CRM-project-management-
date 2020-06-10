<?php
require_once __DIR__ . '/connect.php';
class pays extends connect{
	private $id=0;
	private $pays=0;
	
	public function __construct($param=array()){
		parent::__construct();
		if (isset($param['id']))
				$this->id=$param['id'];
		if (isset($param['pays']))
				$this->pays=$param['pays'];
	}

	public function Liste(){
		$rq = "SELECT * FROM pays";
		return $this->query($rq);
	}
	
	public function Get(){
		$rq = "SELECT * FROM pays where id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->query($rq, $Parmas);
	}
	
	public function Supprimer(){
		$rq = "DELETE FROM pays where id=id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->execute($rq,$Parmas);
	}
	
}
?>