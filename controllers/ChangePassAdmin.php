<?php
	$oldpw=$_POST['oldpass'];
    $newpw=$_POST['newpass'];
	$cpw=$_POST['cpass'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
	if($dao->ChangePassAdmin($newpw,$idAdmin)){
		header("location:../GestionEvents.php");
	}else{
		header("location:../GestionEvents.php?erreur=2");
		die();
	}

?>