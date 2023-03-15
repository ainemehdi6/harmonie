<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location:loginAdmin.php?erreur=2");
}
include_once('DAO.php');
$dao = new DAO();
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
    <title>Accueil Admin</title>
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
    <main class="menu-mobile" style="display:flex;">
        <div class="buttons" style="margin:50px auto 0 auto;">
            <div class="button_font">
                <a style="text-decoration: none;" href="UsersList.php" class="button"> Gestion des membres</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none;" href="gestionEvents.php" class="button"> Gestion des évènements</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none;" href="gestionAdmins.php" class="button"> Gestion des Admins</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none;" href="ChangePassUser.php" class="button"> Changer MDP User</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none;" href="ChangePassAdmin.php" class="button"> Modifier MDP Admin</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none;" href="EditProfilAdmin.php" class="button"> Modifier Profil Admin</a>
            </div>

            <div class="deco">
                <a href="controllers/logout.php">Déconnexion </a>
            </div>
        </div>
    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>