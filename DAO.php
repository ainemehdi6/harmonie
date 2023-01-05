<?php
class DAO{
	public function __construct(){}
	public function connexion(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=harmonie','root','');
		return $pdo;
	}
	public function authentificationUser($email,$password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from users where email= ? and password = ?");
   		$reponse->execute([$email,$password]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
    public function listeEvents(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from event ");
   		$reponse->execute([]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function listeParticipants($eventId){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT event.idEvent,user.idUser,
		user.firstName,user.lastName from user,event,participants where user.idUser = participants.idUser 
		and event.idEvent=participants.idEvent and participants.idEvent = ?");
   		$reponse->execute([$eventId]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function EventById($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from event where idEvent= ?");
   		$reponse->execute([$id]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}	
	public function AddCoursMod($name,$id,$desc){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT INTO CoursMod(name,Degreeid,description) values(?,?,?)");
   		$reponse->execute([$name,$id,$desc]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function UpdateCoursMod($name,$degid,$desc,$id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE CoursMod SET name=?, Degreeid=?, description=? WHERE id=?");
   		$reponse->execute([$name,$degid,$desc,$id]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function UpdateCours($name,$degid,$desc,$id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE Cours SET name=?, CoursModid=?, description=? WHERE id=?");
   		$reponse->execute([$name,$degid,$desc,$id]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
}    