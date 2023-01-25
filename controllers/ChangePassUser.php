<?php
	$oldpw=$_POST['olduserpw'];
    $newpw=$_POST['newuserpassword'];
	$cpw=$_POST['cnewuserpassword'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
    if($newpw == $cpw){
        if($dao->getUserPassword() == $oldpw){
            if($dao->ChangeUserPass($newpw)){
                header("location:../MenuAdmin.php");
            }else{
                header("location:../MenuAdmin.php?erreur=2");
                die();
            }
        }else{
            header("location:../ChangePassUser.php?erreur=3");
                die();
        }
    }else{
        header("location:../ChangePassUser.php?erreur=4");
        die();
    }
  
	

?>