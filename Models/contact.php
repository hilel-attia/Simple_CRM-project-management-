<?php
require_once __DIR__ . '/connect.php';
class contact extends connect{
	private $id=0;                 
	private $idPartenaire=0;
	private $idUser=0;
	private $comentaire='';
	private $date=0;
	
	
	public function __construct($param = array()){
		parent::__construct();
		if (isset($param['id']))
			$this->id=$param['id'];

		if (isset($param['idPartenaire']))
			$this->idPartenaire=$param['idPartenaire'];

		if (isset($param['idUser']))
			$this->idUser=$param['idUser'];


		if (isset($param['comentaire']))
			$this->comentaire=$param['comentaire'];

		if (isset($param['date']))
			$this->date=$param['date'];

		
		
	}

			
	public function Liste(){
	
        $rq = 'SELECT contact.id, Partenaire.nomSociete, User.nom nomUser, comentaire , date 
		FROM contact 
		left join partenaire on partenaire.id = contact.idPartenaire
		left join user on user.id = contact.idUser
		order by  contact.id desc ' ;
	
		return $this->query($rq);
	}
	public function Get(){
		if($this->id==0)
			return array(
				'id'=>$this->id,
				'idPartenaire'=>$this->idPartenaire,
				'idUser'=>$this->idUser,
				'date'=>$this->date,
				'comentaire'=>$this->comentaire,
				);
		else{
		$params=array('id'=>$this->id);
		$rq = 'SELECT contact.id, Partenaire.nomSociete, User.nom nomUser, contact.comentaire , contact.date , contact.idPartenaire, contact.idUser
		FROM contact 
		left join partenaire on partenaire.id = contact.idPartenaire
		left join user on user.id = contact.idUser
		where contact.id=:id ' ;
	
		return $this->query($rq, $params)[0];
		}
	}
	public function Supprimer(){
		
		$params=array('id'=>$this->id);
		$rq = "DELETE FROM contact where id=:id";
		return $this->execute($rq,$params);
	}
	public function ajouter(){
		$rq='insert into contact (idPartenaire, idUser, comentaire, date) values ( :idPartenaire, :idUser, :comentaire, :date) ; ';
	
		$params=array(
                      
                        'idPartenaire'=>$this->idPartenaire,
                        'idUser'=>$this->idUser,
                        'comentaire'=>$this->comentaire,
                        'date'=>$this->date,
                        );
		return $this->execute($rq,$params);
	}
	public function Update(){
								$rq = "Update contact  set 
								idPartenaire=:idPartenaire,
								idUser=:idUser,
                                comentaire =:comentaire,
                                date=:date
                                where id=:id";

		$params=array( 
						'idPartenaire'=>$this->idPartenaire,
						'idUser'=>$this->idUser,
						 'id'=>$this->id,
                        'comentaire'=>$this->comentaire,
						'date'=>$this->date,
					
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