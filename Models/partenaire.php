<?php
require_once __DIR__ . '/connect.php';
class partenaire extends connect{
	private $id=0;                  
	private $nomSociete='';   
	private $pays='';
	private $adresse='';
	private $nomContact='';
	private $nombreEmploye=0;
    private $contrat=0;
    private $forme=0;
	private $typepartenaire='';
	
	public function __construct($param = array()){
		parent::__construct();
		if (isset($param['id']))
			$this->id=$param['id'];

		if (isset($param['nomSociete']))
			$this->nomSociete=$param['nomSociete'];

		if (isset($param['pays']))
			$this->pays=$param['pays'];


		if (isset($param['adresse']))
			$this->adresse=$param['adresse'];

		if (isset($param['nomContact']))
			$this->nomContact=$param['nomContact'];

		if (isset($param['nombreEmploye']))
			$this->nombreEmploye=$param['nombreEmploye'];

		if (isset($param['contrat']))
			$this->contrat=$param['contrat'];

		if (isset($param['forme']))
			$this->forme=$param['forme'];	

	
			
		if (isset($param['typepartenaire']))
			$this->typepartenaire=$param['typepartenaire'];
		
	}

			
	public function Liste(){

	
		$rq="SELECT partenaire.`id`, partenaire.`nomSociete`, pays.`nom` nomPays  , partenaire.`adresse`, partenaire.`nomContact`,
					partenaire.`nombreEmploye`,partenaire.`contrat`,  partenaire.`forme` , partenaire.`typepartenaire` ,typepartenaire.nom nomType  
		 			FROM partenaire
					left JOIN typepartenaire ON  partenaire.typepartenaire = typepartenaire.id
					left JOIN  pays ON partenaire.pays = pays.id ";
		  			
		return $this->query($rq);
	}
	public function Get(){
		if($this->id==0)
			return array(
				'id'=>$this->id ,
				'nomSociete'=>$this->nomSociete,
				'nomPays'=>$this->pays,
				'adresse'=>$this->adresse,
				'nomContact'=>$this->nomContact,
				'nombreEmploye'=>$this->nombreEmploye ,
				'contrat'=>$this->contrat ,
				'forme'=>$this->forme ,

				'typepartenaire'=>$this->typepartenaire ,
				

				);
		else{
		$params=array('id'=>$this->id);
		$rq=' SELECT partenaire.`id`, partenaire.`nomSociete`, pays.`nom` nomPays , partenaire.`adresse`, partenaire.`nomContact`,
					partenaire.`nombreEmploye`,partenaire.`contrat`, partenaire.`forme`, partenaire.`typepartenaire`, typepartenaire.nom nomType  
		 			FROM partenaire
					left JOIN typepartenaire ON  partenaire.typepartenaire = typepartenaire.id
					left JOIN  pays ON partenaire.pays = pays.id 
					 where  partenaire.id=:id ';
		return $this->query($rq, $params)[0];
		}
	}
	public function Supprimer(){
		
		$params=array('id'=>$this->id);
		$rq = "DELETE FROM partenaire where id=:id";
		return $this->execute($rq, $params);
	}
	public function ajouter(){
		$rq='insert into partenaire (nomSociete, pays, adresse, nomContact, nombreEmploye, contrat, forme,typepartenaire) values (:nomSociete, :pays, :adresse, :nomContact, :nombreEmploye,:contrat, :forme, :typepartenaire) ; ';
		$params=array('nomSociete'=>$this->nomSociete,
						'pays'=>$this->pays,
						'adresse'=>$this->adresse,
						'nomContact'=>$this->nomContact,
						'nombreEmploye'=>$this->nombreEmploye,
						'contrat'=>$this->contrat,
						'forme'=>$this->forme,
						'typepartenaire'=>$this->typepartenaire ,
						
	);
		return  $this->execute($rq,$params);
	
	}
	public function Update(){
		$rq = " Update partenaire set
		    nomSociete =:nomSociete,
			pays =:pays,
			adresse =:adresse,
			nombreEmploye=:nombreEmploye,
			nomContact=:nomContact,
			contrat=:contrat,
			forme=:forme,
			typepartenaire=:typepartenaire
			where id=:id";
		$params=array( 
						'nomSociete'=>$this->nomSociete,
						'pays'=>$this->pays,
						'adresse'=>$this->adresse,
						'nombreEmploye'=>$this->nombreEmploye,
						'nomContact'=>$this->nomContact,
						'contrat'=>$this->contrat,
						'forme'=>$this->forme,
						'typepartenaire'=>$this->typepartenaire,
						'id'=>$this->id,
					);
		return $this->execute($rq,$params);
	}
	
	public function authentificat(){
		
		$rq = "SELECT login, password, nom,type FROM user where login=:login and  password=:password";
		
		$params=array(
				'login'=>$this->login,
				'password'=>$this->password 
				);
		 return $this->query($rq,$params);
	}
}
?>