<?php
 	$idEvent=$_POST['idEvent'];
	$titre=$_POST['titre'];
<<<<<<< HEAD
    $description=$_POST['description'];
=======
    $idEvent=$_POST['idEvent'];
	$lieu=$_POST['lieu'];
	$description=$_POST['description'];
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8
    $date=$_POST['date'];
    $statut=$_POST['statut'];
    $lieu=$_POST['lieu'];

   
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
<<<<<<< HEAD
	if($dao->EditEvent($idEvent,$titre,$description,$date,$statut,$lieu)){
=======
	if($dao->EditEvent($titre,$lieu,$description,$date,$statut,$idEvent)){
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}
