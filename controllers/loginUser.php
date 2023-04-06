<?php
	$password=$_POST['password'];
	include('../DAO.php');
	$dao=new DAO();
    
    $passwordHash = md5($password);
    
	if($dao->Globalauthentification($passwordHash)){
		
		header("location:../EventsList.php");
	}else{
		header("location:../loginUser.php?erreur=2");
		die();
	}

?>



?>