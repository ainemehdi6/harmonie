<?php
    $oldpw=$_POST['oldpass'];
    $newpw=$_POST['newpass'];
    $cpw=$_POST['cpass'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
    include('../DAO.php');
    $dao=new DAO();
    if($newpw == $cpw){
        if($dao->getAdminPassword($idAdmin) == $oldpw){
            if($dao->ChangeAdminPass($newpw,$idAdmin)){
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
