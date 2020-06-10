<?php
session_start();


if(!isset($_SESSION["login"]))
	header("Location:login.php");

$Message = '';  
$Model = 'partenaire';
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
		// var_dump($_POST);
		$Objet->Update();
		$Message = "partenaire modifier";
		// exit;
	}
	elseif($_GET['Action'] == 'ajouter'){
		$row = $Objet->Get();

		require_once ("models/pays.php");
		$pays = new pays();
		$rowspays= $pays->liste();

		require_once ("models/typepartenaire.php");
		$typepartenaire = new typepartenaire();
		$rowstypepartenaire = $typepartenaire->liste();
		//var_dump($rowstypepartenaire); echo "Views/ajouter$Model.php"; exit;
		$FormAction = 'ajouterAction';
		include "Views/ajouter$Model.php";
		
	}
	
	elseif($_GET['Action'] == 'ajouterAction'){
		
		//var_dump($_POST);
		$Objet=new $Model($_POST);
		$retour=$Objet->ajouter();
		//var_dump($retour);
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
		
		require_once ("models/typepartenaire.php");
		$typepartenaire = new typepartenaire();
		$rowstypepartenaire = $typepartenaire->liste();
		$FormAction = 'updateAction';
		include "Views/ajouter$Model.php";

	}
	
}

$rows=$Objet->liste();
include 'Views/index2.php';

?>