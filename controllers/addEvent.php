<?php
	$titre=$_POST['titre'];
	$lieu=$_POST['lieu'];
	$description=$_POST['description'];
    $date=$_POST['date'];
	$lieu=$_POST['lieu'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
<<<<<<< HEAD
	if($dao->AddEvent($titre,$description,$date,$idAdmin,$lieu)){
=======
	if($dao->AddEvent($titre,$lieu,$description,$date,$idAdmin)){
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}
