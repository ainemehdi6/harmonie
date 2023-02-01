<?php
class DAO{
	public function __construct(){}
	public function connexion(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=harmonie','root','');
		return $pdo;
	}
	
	public function NumberOfPresents($idEvent){
		$con = mysqli_connect('127.0.0.1','root','','harmonie');
		mysqli_select_db($con,"harmonie");
		$sql="select distinct count(idUser) from participants where idEvent=$idEvent ";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
		$resultstring = $result['count(idUser)'];
		mysqli_close($con); 
   		return $resultstring;
	}

	public function UserIsPresent($idUser,$idEvent){
		$con = mysqli_connect('127.0.0.1','root','','harmonie');
		mysqli_select_db($con,"harmonie");
		$sql="select count(idUser) from participants where idEvent=$idEvent and idUser=$idUser";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
		$resultstring = $result['count(idUser)'];
		mysqli_close($con); 
   		return $resultstring;
	}

	public function NumberOfMembers(){
		$con = mysqli_connect('127.0.0.1','root','','harmonie');
		mysqli_select_db($con,"harmonie");
		$sql="select distinct count(idUser) from user";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
		$resultstring = $result['count(idUser)'];
		mysqli_close($con); 
   		return $resultstring;
	}

	public function getUserPassword(){
		$con = mysqli_connect('127.0.0.1','root','','harmonie');
		mysqli_select_db($con,"harmonie");
		$sql="select password from memberspassword";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
		$resultstring = $result['password'];
		mysqli_close($con); 
   		return $resultstring;
	}

	public function getAdminPassword($idAdmin){
		$con = mysqli_connect('127.0.0.1','root','','harmonie');
		mysqli_select_db($con,"harmonie");
		$sql="select password from admin where idAdmin=$idAdmin";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
		$resultstring = $result['password'];
		mysqli_close($con); 
   		return $resultstring;
	}

	public function authentificationUser($email,$password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from admin where email= ? and password = ?");
   		$reponse->execute([$email,$password]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function Globalauthentification($password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from memberspassword where password = ?");
   		$reponse->execute([$password]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function User($email){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT idAdmin from admin where email= ?");
		$reponse->execute([$email]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}

    public function listeEvents(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from event ORDER BY date DESC");
   		$reponse->execute([]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}

	public function listeUsers(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from user ");
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
		$reponse=$bdd->prepare("SELECT user.idUser,user.firstName,user.lastName, 
		user.email,user.phoneNumber from user,event,participants 
		where user.idUser = participants.idUser and event.idEvent=participants.idEvent 
		and participants.idEvent = ?");
   		$reponse->execute([$eventId]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}

	public function listeNonParticipants($eventId){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT user.idUser,user.firstName,user.lastName, user.email,
		user.phoneNumber from user where idUser != ALL(SELECT idUser from participants WHERE idEvent = ?);");
   		$reponse->execute([$eventId]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}

	public function addParticipant($iduser,$idEvent){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT INTO participants(idUser,idEvent) values(?,?)");
   		$reponse->execute([$iduser,$idEvent]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function removeParticipant($iduser,$idEvent){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from participants where idUser=? and idEvent=?");
   		$reponse->execute([$iduser,$idEvent]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
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

	public function AddEvent($titre,$description,$date,$idAdmin){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT INTO event(titre,description,date,idAdmin) values(?,?,?,?)");
   		$reponse->execute([$titre,$description,$date,$idAdmin]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	
	public function deleteEvent($idEvent){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from event where idEvent=?");
   		$reponse->execute([$idEvent]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function deleteUser($idUser){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from user where idUser=?");
   		$reponse->execute([$idUser]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function EditEvent($titre,$description,$date,$statut,$idEvent){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE event set titre=?,description=?,date=?,statut=? where idEvent=?");
   		$reponse->execute([$titre,$description,$date,$statut,$idEvent]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function EditUser($Nom,$prenom,$email,$numero,$role,$idUser){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE user set firstName=?,lastName=?,email=?,phoneNumber=? ,role=? where idUser=?");
   		$reponse->execute([$prenom,$Nom,$email,$numero,$role,$idUser]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function ChangeAdminPass($newpassword,$idAdmin){
        $bdd=$this->connexion();
        $reponse=$bdd->prepare("UPDATE admin set password=? where idAdmin=?");
           $reponse->execute([$newpassword,$idAdmin]); 
           if ($ligne=$reponse->fetch()) return true;
           else return false;
	}	  
	public function AddUser($nom,$prenom,$email,$numero,$role){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT INTO user(lastName,firstName,email,phoneNumber,role) values(?,?,?,?,?)");
   		$reponse->execute([$nom,$prenom,$email,$numero,$role]); 
		   if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}

	public function ChangeUserPass($password){
        $bdd=$this->connexion();
        $reponse=$bdd->prepare("UPDATE memberspassword set password=?");
           $reponse->execute([$password]); 
           if ($ligne=$reponse->fetch()) return true;
           else return false;
	}	
}    