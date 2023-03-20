<?php
session_start();
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
  <title>Liste des utilisateurs</title>
</head>

<body>
<?php require('assets/models/navbar.php')?>


  <?php include_once('assets/models/headerAdmin.php') ?>


  <main id="main">
    <h2 class="center-text">Liste des utilisateurs</h2>
    <div class="buttons_listusers">
      <form class="upload" action="" method="POST" enctype="multipart/form-data">
        <label for="file-input">
          <div class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> Choose File
          </div>
        </label>
        <input id="file-input" type="file" style="display:none;" />

        <div class="btns-grp">
          <a href="controllers/importer.php" class="btn btn-main btn-primary">exporter</a>
        </div>
      </form>


      <div class="btns-grp">
        <div class="btns-grp">
          <a href="#" class="btn btn-main btn-primary" onclick="AddUserBoxOn()">Ajouter</a>
        </div>
        <div class="btns-grp">
          <a href="controllers/deleteAllUser.php" class="deletealluser">Supprimer la liste des membres</a>
        </div>
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

        $listUsers = $dao->listeUsers();
        foreach ($listUsers as $user) {
          echo '
                <tr>
                  <td>' . $user[1] . '</td>
                  <td>' . $user[2] . '</td>
                  <td>' . $user[4] . '</td>
                  <td>' . $user[3] . '</td>
                  <td>
                    <a href="#" class="btn btn-primary" onclick="EditUserBoxOn(' . $user[0] . ')">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>&nbsp&nbsp&nbsp&nbsp
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteUser' . $user[0] . '">
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
      <h3>Ajouter Utilisateurs</h3>
      <div class="post-project-fields">
        <form action="controllers/addUser.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <input type="text" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="col-lg-12">
              <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="col-lg-12">
              <input type="text" name="email" placeholder="Email">
            </div>
            <div class="col-lg-12">
              <input type="text" name="numero" placeholder="Numéro">
            </div>
            <div class="col-lg-12 center">
              <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="post">Ajouter</button>
              <button class="btn btn-secondary btn-lg btn-block" href="#" title="" type="cancel">Cancel</button>
            </div>
          </div>
        </form>
      </div><!--post-project-fields end-->
      <a href="#" onclick="AddUserBoxOn()"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
          <g fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor" />
          </g>
        </svg></a>
    </div><!--post-project end-->
  </div><!--post-project-popup end-->

  <?php
  $listUser = $dao->listeUsers();
  foreach ($listUser as $user) {
    echo '
                <div class="post-popup job_post" id="edit_user' . $user[0] . '">
                        <div class="post-project">
                        <h3>Modifier un évenement</h3>
                        <div class="post-project-fields">
                            <form action="controllers/editUser.php" method="post" enctype="multipart/form-data"> 
                                <div class="row">
                                <div class="col-lg-12">             
                                  <input type="hidden" name="idUser" value="' . $user[0] . '" >
                                  <input type="text" name="prenom" placeholder="Prénom" value="' . $user[1] . '" required>
                                </div> 
                                <div class="col-lg-12">
                                    <input type="text" name="nom" placeholder="Nom" value="' . $user[2] . '" required>
                                </div>
                                <div class="col-lg-12">
                                  <input type="text" name="email" placeholder="email" value="' . $user[3] . '">
                                </div>
                                <div class="col-lg-12">
                                  <input type="text" name="numero" placeholder="numéro" value="' . $user[4] . '">
                                </div>
                                    <div class="col-lg-12">
                                      <button  class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="post">Modifier</button>
                                      <button class="btn btn-secondary btn-lg btn-block" href="#" title="" type="cancel">Cancel</button>
                                      
                                    </div>
                                </div>
                            </form>
                        </div><!--post-project-fields end-->
                        <a href="#" onclick="EditUserBoxOn(' . $user[0] . ')"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12zm8.207-3.207a1 1 0 0 0-1.414 1.414L10.586 12l-1.793 1.793a1 1 0 1 0 1.414 1.414L12 13.414l1.793 1.793a1 1 0 0 0 1.414-1.414L13.414 12l1.793-1.793a1 1 0 0 0-1.414-1.414L12 10.586l-1.793-1.793z" fill="currentColor"/></g></svg></a>
                    </div><!--post-project end-->
                </div><!--post-project-popup end-->';
  } ?>

  <?php
  $listUser = $dao->listeUsers();
  foreach ($listUser as $user) {
    echo '
  <!-- Modal -->
  <div class="modal fade" id="deleteUser' . $user[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmer la supression</h5>
          <a type="button" class="btn btn-lg"style="background-color:white:" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
        <strong>' . $user[1] . ' ' . $user[2] . '</strong> va étre supprimé
      </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="controllers/deleteUser.php?idUser=' . $user[0] . '">Comfirmer</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>';
  }
  ?>
  <?php include_once('assets/models/footer.html') ?>

  <script>
    function EditUserBoxOn(userId) {
      var popup = document.getElementById("edit_user" + userId);
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