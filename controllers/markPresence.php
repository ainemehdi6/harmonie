<?php
	$userId=$_GET['userId'];
	$eventId=$_GET['eventId'];
    $type=$_GET['type'];
    $page=$_GET['page'];
	include('../DAO.php');
	$dao=new DAO();
    if($type=='present')
    {
        if($dao->addParticipant($userId,$eventId)){ 
            header("location:../$page.php?eventId=$eventId&user=$userId");
        }else{
            header("location:../$page.php?eventId=$eventId&erreur=2&user=$userId");
            die();
        }
    }
    else if($type=='abs')
    {
        if($dao->removeParticipant($userId,$eventId)){ 
            header("location:../$page.php?eventId=$eventId&user=$userId");
        }else{
            header("location:../$page.php?eventId=$eventId&erreur=2&user=$userId");
            die();
        }
    }
	

?>