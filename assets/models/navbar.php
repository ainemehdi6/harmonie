<?php
// Récupération de l'URL de la page
$url = $_SERVER['REQUEST_URI'];
// Récupération de la partie de l'URL après le dernier /
$activePage = basename($url);
?>

<!-- Barre de navigation -->
<nav id="nav" class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <!-- Marque -->
        <a id="navlink" class="navbar-brand" href="#">Harmonie</a>

        <!-- Liens de navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul id="nav-item" class="navbar-nav mr-auto">
                <li class="nav-item btnnav <?php if($activePage == 'UsersList.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link" href="UsersList.php">Gestion des membres</a>
                </li>
                <li class="nav-item btnnav <?php if($activePage == 'GestionEvents.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link" href="GestionEvents.php">Gestion des évènements</a>
                </li>
                <li class="nav-item btnnav <?php if($activePage == 'GestionAdmins.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link" href="GestionAdmins.php">Gestion des Admins</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item btnnav <?php if($activePage == 'ChangePassUser.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link" href="ChangePassUser.php">Changer MDP User</a>
                </li>
                <li class="nav-item btnnav <?php if($activePage == 'ChangePassAdmin.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link " href="ChangePassAdmin.php">Modifier MDP Admin</a>
                </li>
                <li class="nav-item btnnav <?php if($activePage == 'EditProfilAdmin.php') echo 'page'; ?>">
                    <a id="navlink" class="nav-link" href="EditProfilAdmin.php">Modifier Profil Admin</a>
                </li>
                <li class="nav-item btnnav">
                    <a id="navlink" class="nav-link" href="controllers/logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
/* Style the buttons */
.btnnav {
  border: none;
  outline: none;
  padding: 10px 18px;
  background-color: #01369b;
  cursor: pointer;
  font-size: 15px;
}

/* Style the active class, and buttons on mouse-over */
.page, .btnnav:hover {
  background-color: grey;
  color: white;
}
.navbar-custom{
  background-color: #01369b;
  color:black;
}
#navlink{
  color:white;
}
</style>