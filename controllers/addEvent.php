<?php
	$titre=$_POST['titre'];
	$description=$_POST['description'];
    $date=$_POST['date'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->AddEvent($titre,$description,$date,$idAdmin)){
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}
