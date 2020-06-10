<?php
session_start();


if(!isset($_SESSION["login"]))
	header("Location:login.php");

$Message = '';  
$Model = 'projet';
if(isset($_GET['Model']))
	$Model = $_GET['Model'];
require_once ("models/$Model.php");
$Objet=new $Model ;
if(isset($_GET['Action'])){
	// Traitement selon Action 
	if($_GET['Action'] == 'widget'){
		$colors = array('dark', 'grey', 'blue', 'green');
		$bars = array('dark', 'gray', 'info', 'success');
		
                              
		$Objet=new $Model();
		$Partenaires = $Objet->widget();
		$Total = 0;
		foreach ( $Partenaires as $partenaire )
			$Total+=$partenaire['total'];
		include "Views/widget.php";
		// exit;
	}
	elseif($_GET['Action'] == 'delete'){
		$Objet=new $Model($_GET);
		$Objet->Supprimer();
		$Message = "$Model supprimer";
	}
	elseif($_GET['Action'] == 'updateAction'){
		$Objet=new $Model($_POST);
		$Objet->Update();
		$Message = "projet modifier";
		//exit;
	}
	elseif($_GET['Action'] == 'ajouter'){
		$row = $Objet->Get();

		require_once ("models/pays.php");
		$pays = new pays();
		$rowspays= $pays->liste();

		require_once ("models/statut.php");
		$statut = new statut();
		$rowsstatut = $statut->liste();

		require_once ("models/partenaire.php");
		$partenaire = new partenaire();
		$rownomSociete = $partenaire->liste();

		// var_dump($rownomSociete); // exit;
		$FormAction = 'ajouterAction';
		include "Views/ajouter$Model.php";
		
	}
	
	elseif($_GET['Action'] == 'ajouterAction'){
		
		// var_dump($_POST);
		$Objet=new $Model($_POST);
		$retour=$Objet->ajouter();
		// var_dump($retour);
		if($retour)
			$message='insert ok';
		else
			$message='insert ko';
		//exit;
	}
	elseif($_GET['Action'] == 'update'){
		
		$Objet=new $Model($_GET);
		$row = $Objet->Get();

		require_once ("models/pays.php");
		$pays = new pays();
		$rowspays = $pays->liste();

		require_once ("models/statut.php");
		$statut = new statut();
		$rowsstatut = $statut->liste();

		require_once ("models/partenaire.php");
		$partenaire = new partenaire();
		$rownomSociete = $partenaire->liste();
		
		$FormAction = 'updateAction';
		include "Views/ajouter$Model.php";

	}
	
	
}

$rows=$Objet->liste();
include 'Views/index4.php';

?>