<?php
	$idUser=$_GET['idUser'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
    $dao->deleteUser($idUser);
	if($dao->deleteUser($idUser)){
		header("location:../UsersList.php");
	}else{
		header("location:../UsersList.php?erreur=2");
		die();
	}

?>