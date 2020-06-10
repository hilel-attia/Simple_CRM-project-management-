<?php
require_once __DIR__ . '/connect.php';
class user extends connect{
	private $id=0;
	private $nom='';
	private $email='';
	private $telephone='';
	private $adresse='';
	private $type=0;
	private $login='';
	private $password='';
	
	public function __construct($param = array()){
		parent::__construct();
		if (isset($param['id']))
			$this->id=$param['id'];
		if (isset($param['email']))
			$this->email=$param['email'];
		if (isset($param['telephone']))
			$this->telephone=$param['telephone'];
		if (isset($param['adresse']))
			$this->adresse=$param['adresse'];
		if (isset($param['type']))
			$this->type=$param['type'];
		if (isset($param['login']))
			$this->login=$param['login'];
		if (isset($param['password']))
			$this->password=$param['password'];
		if (isset($param['nom']))
			$this->nom=$param['nom'];
		
	}
	
	
	
	public function Liste(){
		$rq = "SELECT user.`id`,user.`nom`,user.`email`,user.`telephone`,user.`adresse`,user.`type`, user.`login`, type.nom as nomtype
		FROM user, type
		where user.type = type.id";
		return $this->query($rq);
	}
	public function Get(){
		if($this->id==0)
			return array('nom'=>$this->nom,
				'email'=>$this->email,
				'adresse'=>$this->adresse,
				'login'=>$this->login,
				'telephone'=>$this->telephone,
				'password'=>$this->password ,
				'id'=>$this->id ,
				'type'=>$this->type ,
				);
		else{
		$params=array('id'=>$this->id);
		$rq = "SELECT * FROM user where id=:id";
		return $this->query($rq, $params)[0];
		}
	}
	public function Supprimer(){
		
		$params=array('id'=>$this->id);
		$rq = "DELETE FROM user where id=:id";
		return $this->execute($rq, $params);
	}
	public function ajouter(){
		$rq='insert into user (nom, email, telephone, adresse, login, password, type) values (:nom, :email, :telephone, :adresse, :login,:password, :type) ; ';
		$params=array('nom'=>$this->nom,
						'email'=>$this->email,
						'adresse'=>$this->adresse,
						'login'=>$this->login,
						'telephone'=>$this->telephone,
						'password'=>$this->password,
						'type'=>$this->type );
		return $this->execute($rq,$params);
	}
	public function Update(){
		$rq = "Update user 
		set nom =:nom,
			email =:email,
			telephone =:telephone,
			adresse=:adresse,
			login=:login,
			password=:password,
			type=:type
			where id=:id";
		$params=array('nom'=>$this->nom,
				'email'=>$this->email,
				'adresse'=>$this->adresse,
				'login'=>$this->login,
				'telephone'=>$this->telephone,
				'password'=>$this->password ,
				'id'=>$this->id ,
				'type'=>$this->type ,
				);
		return $this->execute($rq,$params);
	}
	
	public function authentificat(){
		
		$rq = "SELECT id, login, password, nom,type,partenaire
                    FROM user where login=:login and  password=:password";
		
		$params=array(
				'login'=>$this->login,
				'password'=>$this->password 
				);
		 return $this->query($rq,$params);
	}
}
?>