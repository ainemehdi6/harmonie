<?php
	$nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
	$email=$_POST['email'];
    $role=$_POST['role'];
    $numero=$_POST['numero'];
    $idUser=$_POST['idUser'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->EditUser($nom,$prenom,$email,$numero,$role,$idUser)){
		header("location:../UsersList.php");
	}else{
		header("location:../UsersList.php?erreur=2");
		die();
	}

?>