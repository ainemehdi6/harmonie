<?php
	$titre=$_POST['titre'];
    $idEvent=$_POST['idEvent'];
	$description=$_POST['description'];
    $date=$_POST['date'];
    $statut=$_POST['statut'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->EditEvent($titre,$description,$date,$statut,$idEvent)){
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}

?>