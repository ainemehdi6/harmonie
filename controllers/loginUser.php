<?php
	$password=$_POST['password'];
	include('../DAO.php');
	$dao=new DAO();
	if($dao->Globalauthentification($password)){
		header("location:../EventsList.php");
	}else{
		header("location:../loginUser.php?erreur=2");
		die();
	}

?>placeholder="Entrer le mot de passe">placeholder="Entrer le mot de passe">placeholder="Entrer le mot de passe">placeholder="Entrer le mot de passe">placeholder="Entrer le mot de passe">