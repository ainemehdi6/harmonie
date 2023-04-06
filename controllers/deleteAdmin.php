<?php
	$idAdmin=$_GET['idAdmin'];
    session_start();
    $idAdminSession = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($idAdmin == $idAdminSession){
		header("location:../GestionAdmins.php?erreur=2");
		die();
	}else{
		if($dao->deleteAdmin($idAdmin)){
			header("location:../GestionAdmins.php");
		}else{
			header("location:../GestionAdmins.php?erreur=3");
	}
	}
?>