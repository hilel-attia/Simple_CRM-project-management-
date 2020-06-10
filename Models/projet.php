<?php
require_once __DIR__ . '/connect.php';
class projet extends connect{
	private $id=0;       
	private $nomContact='';   
	private $pays='';   
	private $idPartenaire=0;
	private $nomProjet='';
	private $montant=0;
    private $statut='';
	private $commentaire='';
	private $remise='';
	private $facture='';
	private $bandeCommande='';
	private $pieceJointe='';
	private $dateCommande='';
	private $dateFacture='';
	


	public function __construct($param = array()){
		parent::__construct();
		if (isset($param['id']))
			$this->id=$param['id'];

		

		if (isset($param['pays']))
			$this->pays=$param['pays'];


		if (isset($param['idPartenaire']))
			$this->idPartenaire=$param['idPartenaire'];

		if (isset($param['nomProjet']))
			$this->nomProjet=$param['nomProjet'];

		if (isset($param['nomContact']))
			$this->nomContact=$param['nomContact'];

		if (isset($param['montant']))
			$this->montant=$param['montant'];

		if (isset($param['statut']))
			$this->statut=$param['statut'];	

		if (isset($param['commentaire']))
			$this->commentaire=$param['commentaire'];

		if (isset($param['remise']))
			$this->remise=$param['remise'];
		

		if (isset($param['dateCommande']))
			$this->dateCommande=$param['dateCommande'];

		if (isset($param['facture']))
			$this->facture=$param['facture'];


		if (isset($param['bandeCommande']))
			$this->bandeCommande=$param['bandeCommande'];


		if (isset($param['pieceJointe']))
			$this->pieceJointe=$param['pieceJointe'];
			
		if (isset($param['dateFacture']))
			$this->dateFacture=$param['dateFacture'];

		
	}
			 

			
	public function widget(){
		

		$rq="SELECT count(*) total,idPartenaire,partenaire.nomSociete FROM `projet`
		 left join partenaire on partenaire.id=projet.idPartenaire group by idPartenaire,nomSociete";
		  			
		return $this->query($rq);
	}
			
	public function Liste(){
		
		$Filtre = '';
		if($_SESSION['type'] == 2)
			$Filtre = ' where projet.idPartenaire = '.$_SESSION['partenaire'] ;

		$rq="SELECT projet.`id`, pays.`nom` nomPays, partenaire.`nomSociete`, projet.`nomProjet`, projet.`nomcontact`, 
		projet.`remise`, projet.`dateCommande`,projet.`facture`,projet.`bandeCommande`,projet.`pieceJointe`, projet.`dateFacture`
		,projet.`montant`,statut.`nom` nomStatut, projet.`commentaire`,projet.`idPartenaire`
		 FROM projet
		left JOIN statut ON  projet.statut = statut.id
		left JOIN  pays ON projet.pays = pays.id 
		left join partenaire on projet.idPartenaire=partenaire.id 
		$Filtre";
		  			
		return $this->query($rq);
	}
	public function Get(){
		if($this->id==0)
			return array(
				'id'=>$this->id ,
				'nomPays'=>$this->pays,
				'nomContact'=>$this->nomContact,
				'idPartenaire'=>$this->idPartenaire,
				'nomProjet'=>$this->nomProjet,
				'montant'=>$this->montant ,
				'nomStatut'=>$this->statut ,
				'commentaire'=>$this->commentaire ,
				'remise'=>$this->remise,
				'dateCommande'=>$this->dateCommande,
				'bandeCommande'=>$this->bandeCommande,
				'facture'=>$this->facture,
				'pieceJointe'=>$this->pieceJointe,
				'dateFacture'=>$this->dateFacture,
			
				);
		else{
		$params=array('id'=>$this->id);
		$rq="SELECT projet.`id`, pays.`nom` nomPays, partenaire.`nomSociete`, projet.`nomProjet`, projet.`nomContact`, 
		projet.`remise`, projet.`dateCommande`,projet.`facture`,projet.`bandeCommande`,projet.`pieceJointe`, projet.`dateFacture`
		,projet.`montant`,statut.`nom` nomStatut, projet.`commentaire`,projet.`idPartenaire`
		 FROM projet
		left JOIN statut ON  projet.statut = statut.id
		left JOIN  pays ON projet.pays = pays.id 
		left join partenaire on projet.idPartenaire=partenaire.id 
		
		
		where projet.id=:id" ;
		return $this->query($rq, $params)[0];
		}
	}
	public function Supprimer(){
		
		$params=array('id'=>$this->id);
		$rq = "DELETE FROM projet where id=:id";
		return $this->execute($rq, $params);
	}
	

	public function ajouter(){
		$rq='insert into projet ( pays, nomContact, idPartenaire, nomProjet,  montant, statut,commentaire,remise,dateCommande,bandeCommande,facture,pieceJointe,dateFacture)
						 values (:pays, :nomContact, :idPartenaire, :nomProjet, :montant, :nomStatut, :commentaire, :remise, :dateCommande, :bandeCommande, :facture, :pieceJointe, :dateFacture) ; ';
		$params=array('pays'=>$this->pays,
						'nomContact'=>$this->nomContact,
                        'idPartenaire'=>$this->idPartenaire,
                        'nomProjet'=>$this->nomProjet,
						'remise'=>$this->remise,
						'dateCommande'=>$this->dateCommande,
						'bandeCommande'=>$this->bandeCommande,
						'facture'=>$this->facture,
						'pieceJointe'=>$this->pieceJointe,
						'dateFacture'=>$this->dateFacture,
                        'montant'=>$this->montant ,
						'nomStatut'=>$this->statut ,
						'commentaire'=>$this->commentaire ,
                       
                        );
		return $this->execute($rq,$params);
	}
	public function Update(){
		$rq = "Update projet 
		set 
			pays =:pays,
			nomContact =:nomContact,
			idPartenaire =:idPartenaire,
			nomProjet=:nomProjet,
			montant=:montant,
            statut=:statut,
			commentaire=:commentaire,
			remise=:remise,
			facture=:facture,
			pieceJointe=:pieceJointe,
			dateFacture=:dateFacture,
			bandeCommande=:bandeCommande,
			dateCommande=:dateCommande
			where id=:id";

	$params=array(  'pays'=>$this->pays,
					'nomContact'=>$this->nomContact,
					'idPartenaire'=>$this->idPartenaire,
					'nomProjet'=>$this->nomProjet,
					'montant'=>$this->montant ,
					'remise'=>$this->remise,
					'dateCommande'=>$this->dateCommande,
					'bandeCommande'=>$this->bandeCommande,
					'facture'=>$this->facture,
					'pieceJointe'=>$this->pieceJointe,
					'dateFacture'=>$this->dateFacture,
					'statut'=>$this->statut ,
					'commentaire'=>$this->commentaire,
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