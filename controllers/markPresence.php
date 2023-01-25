<?php
	$userId=$_GET['userId'];
	$eventId=$_GET['eventId'];
    $type=$_GET['type'];
	include('../DAO.php');
	$dao=new DAO();
    if($type=='present')
    {
        if($dao->addParticipant($userId,$eventId)){ 
            header("location:../Eventpage.php?eventId=$eventId&user=$userId");
        }else{
            header("location:../Eventpage.php?eventId=$eventId&erreur=2&user=$userId");
            die();
        }
    }
    else if($type=='abs')
    {
        if($dao->removeParticipant($userId,$eventId)){ 
            header("location:../Eventpage.php?eventId=$eventId");
        }else{
            header("location:../Eventpage.php?eventId=$eventId&erreur=2");
            die();
        }
    }
	

?>