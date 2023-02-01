<?php
	
    
    $newfirstname=$_POST['oldfirstname'];
    $newlastname=$_POST['oldlastname'];
	$newemail=$_POST['oldemail'];
    $newphonenumber=$_POST['oldphonenumber'];
    session_start();
    $idAdmin = $_SESSION['idAdmin']; 
	include('../DAO.php');
	$dao=new DAO();
            if($dao->EditProfilAdmin($newfirstname,$newlastname,$newemail,$newphonenumber,$idAdmin)){
                header("location:../MenuAdmin.php");
            }else{
                header("location:../MenuAdmin.php?erreur=2");
                die();
            }
?>