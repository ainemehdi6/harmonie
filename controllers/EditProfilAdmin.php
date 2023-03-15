<?php

$newfirstname = $_POST['oldfirstname'];
$newlastname = $_POST['oldlastname'];
$newemail = $_POST['oldemail'];
$newphonenumber = $_POST['oldphonenumber'];
$idAdmin = $_POST['idAdmin'];
include('../DAO.php');
$dao = new DAO();
if ($dao->EditProfilAdmin($newfirstname, $newlastname, $newemail, $newphonenumber, $idAdmin)) {
    header("location:../GestionAdmins.php");
} else {
    header("location:../GestionAdmins.php?erreur=2");
    die();
}
