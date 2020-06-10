<?php
require_once __DIR__ . '/connect.php';
class statut extends connect{
	private $id=0;
	private $statut=0;
	
	public function __construct($param=array()){
		parent::__construct();
		if (isset($param['id']))
				$this->id=$param['id'];
		if (isset($param['statut']))
				$this->statut=$param['statut'];
	}

	public function Liste(){
		$rq = "SELECT * FROM statut";
		return $this->query($rq);
	}
	
	public function Get(){
		$rq = "SELECT * FROM statut where id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->query($rq, $Parmas);
	}
	
	public function Supprimer(){
		$rq = "DELETE FROM statut where id=id=:id";
		$Parmas=array('id'=>$this->id);
		return $this->execute($rq,$Parmas);
	}
	
}
?>