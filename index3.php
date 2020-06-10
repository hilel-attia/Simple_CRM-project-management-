<?php
session_start();


if(!isset($_SESSION["login"]))
	header("Location:login.php");

$Message = '';  
$Model = 'contact';
if(isset($_GET['Model']))
	$Model = $_GET['Model'];
require_once ("models/$Model.php");
$Objet=new $Model ;
if(isset($_GET['Action'])){
	// Traitement selon Action 
	if($_GET['Action'] == 'delete'){
		$Objet=new $Model($_GET);
		$Objet->Supprimer();
		$Message = "$Model supprimer";
	}
	elseif($_GET['Action'] == 'updateAction'){
		$Objet=new $Model($_POST);
		$Objet->Update();
		$Message = "contact modifier";
		//exit;
	}
	elseif($_GET['Action'] == 'ajouter'){
		$row = $Objet->Get();
		require_once ("models/partenaire.php");
		$partenaire = new partenaire();
		$rownomSociete = $partenaire->liste();

	

		require_once ("models/user.php");
		$user = new user();
		$rownomUser= $user->liste();
		
	
	
		// var_dump($rowstype); echo "Views/ajouter$Model.php"; exit;
		$FormAction = 'ajouterAction';
		include "Views/ajouter$Model.php";
		exit;
		
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

	}
	elseif($_GET['Action'] == 'update'){
		
		$Objet=new $Model($_GET);
		$row = $Objet->Get();

		require_once ("models/partenaire.php");
		$partenaire = new partenaire();
		$rownomSociete = $partenaire->liste();

		


	
		require_once ("models/user.php");
		$user = new user();
		$rownomUser= $user->liste();

		$FormAction = 'updateAction';
		include "Views/ajouter$Model.php";

	}
	
}

$rows=$Objet->liste();
include 'Views/index3.php';

?>