<?php
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
    $email=$_POST['email']; 
    $telephone=$_POST['telephone'];
    $password=$_POST['password'];
    
    $passwordHash = md5($password);
    
    session_start();
	include('../DAO.php');
	$dao=new DAO();
	if($dao->addAdmin($nom,$prenom,$email,$telephone,$passwordHash)){
		header("location:../GestionAdmins.php");
	}else{
		header("location:../GestionAdmins.php?erreur=2");
		die();
	}   

?>