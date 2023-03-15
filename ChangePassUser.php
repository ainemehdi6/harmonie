<?php
    session_start();
    if(!isset($_SESSION['idAdmin']))
    {
      header("location:loginAdmin.php?erreur=2");
    }
    include_once('DAO.php');
    $dao=new DAO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
    <title>Admin login</title>

</head>

<body>
    <!-- Blue with white text -->
<nav id="nav" class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">

<!-- Links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="UsersList.php">Gestion des membres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="GestionEvents.php">Gestion des évènements</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="GestionAdmins.php">Gestion des Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ChangePassUser.php">Changer MDP User</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ChangePassAdmin.php">Modifier MDP Admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="EditProfilAdmin.php">Modifier Profil Admin</a>
  </li>
</ul>

</nav>
<?php include_once('assets/models/headerAdmin.php') ?>

    <div class="container">
        <div class="main">
            <h1 class="title-one">Changer mot de passe User</h1>
            <form class="change-password" action="controllers/ChangePassUser.php" method="POST">
            <label>
            <input class="label-info" type="password" name="olduserpw" placeholder="Ancien MDP User">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
            <br>
            <label>
            <input class="label-info" type="password" name="newuserpassword" placeholder="Nouveau Mot de passe">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
            <br>
            <label>
            <input class="label-info" type="password" name="cnewuserpassword" placeholder="Confirmer Mot de passe">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
                <!--<div class="input">
                    <input type="password" name="olduserpw" placeholder="Ancien MDP User">
                </div> <br>
                <div class="input">
                    <input type="password" name="newuserpassword" placeholder="Nouveau Mot de passe">
                </div> <br>
                <div class="input">
                    <input type="password" name="cnewuserpassword" placeholder="Confirmer Mot de passe">
                </div>-->
                <div class="button">
                    <button type="submit">Valider changement</button>
                </div>
        </div>
        </form>

</div>
    <?php include_once('assets/models/footer.html') ?>
    <script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
const eyes = document.querySelectorAll(".feather-eye");
const eyeoffs = document.querySelectorAll(".feather-eye-off");
const passwordFields = document.querySelectorAll("input[type=password]");

for (let i = 0; i < eyes.length; i++) {
  eyes[i].addEventListener("click", () => {
    eyes[i].style.display = "none";
    eyeoffs[i].style.display = "block";

    passwordFields[i].type = "text";
  });

  eyeoffs[i].addEventListener("click", () => {
    eyeoffs[i].style.display = "none";
    eyes[i].style.display = "block";
    passwordFields[i].type = "password";
  });
}
</script>
</body>
<?php var_dump($_SESSION['idAdmin']);?>

</html>