<?php
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
    $email=$_POST['email']; 
    $role=$_POST['role'];
    $numero=$_POST['numero'];
    $pupitre=$_POST['pupitre'];
    session_start();
	include('../DAO.php');
	$dao=new DAO();
	if($dao->AddUser($nom,$prenom,$email,$numero,$role,$pupitre)){
		header("location:../UsersList.php");
	}else{
		header("location:../UsersList.php?erreur=2");
		die();
	}   

?>