<?php
 	$idEvent=$_POST['idEvent'];
	$titre=$_POST['titre'];
    $description=$_POST['description'];
    $date=$_POST['date'];
    $statut=$_POST['statut'];
    $lieu=$_POST['lieu'];

   
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->EditEvent($idEvent,$titre,$description,$date,$statut,$lieu)){
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}
