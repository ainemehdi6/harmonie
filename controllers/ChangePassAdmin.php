<?php
    $oldpw=$_POST['oldpass'];
    $newpw=$_POST['newpass'];
    $cpw=$_POST['cpass'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
    include('../DAO.php');
    $dao=new DAO();
    if($newpw == $cpw){
    	$newPasswordHash = md5($newpw);
        $oldPasswordHash = md5($oldpw);
        if($dao->getAdminPassword($idAdmin) == $oldPasswordHash){
            if($dao->ChangeAdminPass($newPasswordHash,$idAdmin)){
                header("location:../MenuAdmin.php");
            }else{
                header("location:../MenuAdmin.php?erreur=2");
                die();
            }
        }else{
            header("location:../ChangePassAdmin.php?erreur=3");
                die();
        }
    }else{
        header("location:../ChangePassAdmin.php?erreur=4");
                die();
    }
