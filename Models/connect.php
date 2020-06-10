<?php
class connect{

	private $sgbd;
	private $serveur;
	private $dbname;
	private $user;
	private $password;
	private $conexion;
	
    public function __construct(){
		$this->sgbd = 'mysql';
		$this->serveur='localhost';
		$this->dbname='openbee';
		$this->user='root';
		$this->password='';
		$this->conexion = new PDO("$this->sgbd:host=$this->serveur;dbname=$this->dbname", "$this->user", "$this->password");
        

    }
	
	public function query($rq, $param=array()){
		if (count($param))
		{
			$stm=$this->conexion->prepare($rq);
			$retour=$stm->execute($param);
			return $stm->fetchAll();
			
		}
		else{
			$retour=$this->conexion->query($rq);
			// var_dump($rq);
			// var_dump($rq->errorInfo());
			// echo($rq);
			// var_dump($retour);
			if($retour)
				return $retour->fetchAll();
			else 
				return array();
			
		}
			
		
	}
	
	public function execute($rq, $param=array()){
		if (count($param))
		{
			// var_dump($param);
			// echo $rq;
			$stm=$this->conexion->prepare($rq);
			$retour=$stm->execute($param);
			if($retour)
				return $retour;
			else{
				echo "<h1>Rq : $rq</h1>";
				var_dump($param);
				var_dump($stm->errorInfo());
			}
		}
		$c = $this->conexion->query($rq) ;
		return $c;
	}
}

?>