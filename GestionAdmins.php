<?php
session_start();
$idAdmin= $_SESSION['idAdmin']; 
include_once('DAO.php');
$dao = new DAO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/script.js"></script> 
  <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
  <title>Liste des admins</title>
</head>

<body>
  <?php include_once('assets/models/headerAdmin.php') ?>


  <main id="main">
    <h2 class="center-text">Liste des admins</h2>
    <div class="buttons_listusers">

     
      
        <div class="btns-grp">
          <a href="#" class="btn btn-main" onclick="AddAdminBoxOn()">Ajouter</a>
        </div>

      

    </div>
    <div class="wrapper">
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php

      $listAdmins = $dao->listAdmins($idAdmin);
      foreach ($listAdmins as $admin) {
        echo '
                <tr>
                  <td>' . $admin[2] . '</td>
                  <td>' . $admin[1] . '</td>
                  <td>' . $admin[4] . '</td>
                  <td>' . $admin[3] . '</td>
                  <td><a href="#" onclick="EditAdminBoxOn(' . $admin[0] . ')"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp&nbsp&nbsp&nbsp<a href="controllers/deleteAdmin.php?idAdmin=' . $admin[0] . '"><i class="fa-solid fa-trash"></i></a></td>
                  
                </tr>';
      }
      ?>
    </table>
    </div>
  </main>



  <div class="post-popup job_post" id="add_post">
			<div class="post-project">
				<h3>Ajouter Administrateur</h3>
				<div class="post-project-fields">
					<form action="controllers/addAdmin.php" method="post" enctype="multipart/form-data"> 
						<div class="row">
							<div class="col-lg-12">             
								<input type="text" name="nom" placeholder="nom" required>
							</div> 
							<div class="col-lg-12">
                                <input type="text" name="prenom" placeholder="prenom" required>
							</div>
							<div class="col-lg-12">
								<input type="email" name="email" placeholder="email" >
							</div>
                            <div class="col-lg-12">
								<input type="text" name="telephone" placeholder="téléphone">
							</div>
                            <div class="col-lg-12">
								<input type="password" name="password" id="password" placeholder="password">
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button  class="active" name="submit" type="submit" value="post">Ajouter</button></li>
									<li><button href="#" title="" type="cancel">Cancel</button></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" onclick="AddAdminBoxOn()"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor"/></g></svg></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->

    <?php 
                $listAdmin = $dao->listAdmins($idAdmin);
                foreach($listAdmin as $admin){
                echo'
                <div class="post-popup job_post" id="edit_admin'.$admin[0].'">
                        <div class="post-project">
                        <h3>Modifier un admin</h3>
                        <div class="post-project-fields">
                            <form action="controllers/EditProfilAdmin.php" method="post" enctype="multipart/form-data"> 
                                <div class="row">
                                <div class="col-lg-12">             
                                  <input type="hidden" name="idAdmin" value="'.$admin[0].'" >
                                  <input type="text" name="oldfirstname" placeholder="nom" value="'.$admin[2].'" required>
                                </div> 
                                <div class="col-lg-12">
                                    <input type="text" name="oldlastname" placeholder="prenom" value="'.$admin[1].'" required>
                                </div>
                                <div class="col-lg-12">
                                  <input type="email" name="oldemail" placeholder="email" value="'.$admin[3].'">
                                </div>
                                <div class="col-lg-12">
                                  <input type="text" name="oldphonenumber" placeholder="numéro" value="'.$admin[4].'">
                                </div>
                                  <div class="col-lg-12">
                                        <ul>
                                            <li><button  class="active" name="submit" type="submit" value="post">Modifier</button></li>
                                            <li><button href="#" title="" type="cancel">Cancel</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!--post-project-fields end-->
                        <a href="#" onclick="EditAdminBoxOn(' . $admin[0] . ')"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor"/></g></svg></a>
                    </div><!--post-project end-->
                </div><!--post-project-popup end-->';
    } ?>

  <?php include_once('assets/models/footer.html') ?>
  
                <script>
                  function EditAdminBoxOn(adminId) {
                      var popup = document.getElementById("edit_admin"+adminId);
                      var main = document.getElementById("main");
                      var footer = document.getElementById("footer");
                      popup.classList.toggle("active");
                      main.classList.toggle("overlay");
                  }
                </script>
</body>

</html>