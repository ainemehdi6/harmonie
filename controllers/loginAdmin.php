<?php
	$email=$_POST['email'];
	$password=$_POST['password'];
	include('../DAO.php');
	$dao=new DAO();
	if($dao->authentificationUser($email,$password)){
		session_start();
		$info=$dao->User($email);
        foreach($info as $in){
            $idAdmin=$in[0];
        }
        $_SESSION['idAdmin']=$idAdmin; 
		header("location:../MenuAdmin.php");
	}else{
		header("location:../loginAdmin.php?erreur=2");
		die();
	}

?>