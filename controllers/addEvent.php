<?php
	$titre=$_POST['titre'];
	$lieu=$_POST['lieu'];
	$description=$_POST['description'];
    $date=$_POST['date'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->AddEvent($titre,$lieu,$description,$date,$idAdmin)){
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}

?>