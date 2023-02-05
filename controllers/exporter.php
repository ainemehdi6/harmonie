
<?php
session_start();
$idAdmin = $_SESSION['idAdmin'];
include('../DAO.php');
$dao = new DAO();
if ($dao->exporter()) {
    header("location:../UsersList.php");
} else {
    header("location:../UsersList.php?erreur=2");
    die();
}


?>