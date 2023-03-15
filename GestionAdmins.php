<?php
session_start();
$idAdmin = $_SESSION['idAdmin'];
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
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="#" class="btn btn-main btn-primary" onclick="AddAdminBoxOn()">Ajouter</a>
      </div>
    </div>
    <div class="wrapper">
      <table class="table table-bordered thead-dark table-striped">
        <tr>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Téléphone</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php

        $listAdmins = $dao->listAdmins($idAdmin);
        foreach ($listAdmins as $admin) {
          echo '
                <tr>
                  <td>' . $admin[1] . '</td>
                  <td>' . $admin[2] . '</td>
                  <td>' . $admin[4] . '</td>
                  <td>' . $admin[3] . '</td>
                  <td>
                    <a href="#" class="btn btn-primary" onclick="EditAdminBoxOn(' . $admin[0] . ')">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteAdmin' . $admin[0] . '">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                  
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
              <input type="text" name="prenom" placeholder="Prenom *" required>
            </div>
            <div class="col-lg-12">
              <input type="text" name="nom" placeholder="Nom *" required>
            </div>
            <div class="col-lg-12">
              <input type="email" name="email" placeholder="Email *" required>
            </div>
            <div class="col-lg-12">
              <input type="phone" name="telephone" placeholder="Téléphone">
            </div>
            <div class="col-lg-12">
              <input type="password" name="password" id="password" placeholder="password">
            </div>
            <div class="col-lg-12">
              <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="post">Ajouter</button>
              <button class="btn btn-secondary btn-lg btn-block" href="#" title="" type="cancel">Cancel</button>
            </div>
          </div>
        </form>
      </div><!--post-project-fields end-->
      <a href="#" onclick="AddAdminBoxOn()"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
          <g fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor" />
          </g>
        </svg></a>
    </div><!--post-project end-->
  </div><!--post-project-popup end-->

  <?php
  $listAdmin = $dao->listAdmins($idAdmin);
  foreach ($listAdmin as $admin) {
    echo '
                <div class="post-popup job_post" id="edit_admin' . $admin[0] . '">
                        <div class="post-project">
                        <h3>Modifier un admin</h3>
                        <div class="post-project-fields">
                            <form action="controllers/EditProfilAdmin.php" method="post" enctype="multipart/form-data"> 
                                <div class="row">
                                <div class="col-lg-12">             
                                  <input type="hidden" name="idAdmin" value="' . $admin[0] . '" >
                                  <input type="text" name="oldfirstname" placeholder="Prénom *" value="' . $admin[1] . '" required>
                                </div> 
                                <div class="col-lg-12">
                                    <input type="text" name="oldlastname" placeholder="Nom *" value="' . $admin[2] . '" required>
                                </div>
                                <div class="col-lg-12">
                                  <input type="email" name="oldemail" placeholder="Email *" value="' . $admin[3] . '" required>
                                </div>
                                <div class="col-lg-12">
                                  <input type="phone" name="oldphonenumber" placeholder="Numéro" value="' . $admin[4] . '">
                                </div>
                                <div class="col-lg-12">
                                  <button  class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="post">Modifier</button>
                                  <button class="btn btn-secondary btn-lg btn-block" href="#" title="" type="cancel">Cancel</button>
                                </div>
                                </div>
                            </form>
                        </div><!--post-project-fields end-->
                        <a href="#" onclick="EditAdminBoxOn(' . $admin[0] . ')"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor"/></g></svg></a>
                    </div><!--post-project end-->
                </div><!--post-project-popup end-->';
  } ?>

  <?php
  $listAdmin = $dao->listAdmins($idAdmin);
  foreach ($listAdmin as $admin) {
    echo '
  <!-- Modal -->
  <div class="modal fade" id="deleteAdmin' . $admin[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmer la supression</h5>
          <a type="button" class="btn btn-lg"style="background-color:white:" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
        L\'admin <strong>' . $admin[1] . ' ' . $admin[2] . '</strong> va étre supprimé
      </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="controllers/deleteAdmin.php?idAdmin=' . $admin[0] . '">Comfirmer</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>';
  }
  ?>

  <?php include_once('assets/models/footer.html') ?>

  <script>
    function EditAdminBoxOn(adminId) {
      var popup = document.getElementById("edit_admin" + adminId);
      var main = document.getElementById("main");
      var footer = document.getElementById("footer");
      popup.classList.toggle("active");
      main.classList.toggle("overlay");
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>