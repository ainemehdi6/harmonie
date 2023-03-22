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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
    <title>Accueil Admin</title>
</head>
<body>
<?php include_once('assets/models/headerAdmin.php') ?>
        <main style="display:flex;">
        <div class="buttons" style="margin:50px auto 0 auto;">
            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:15px;" href="UsersList.php" class="button"> Gestion des membres</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:15px;" href="GestionEvents.php" class="button"> Gestion des évènements</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:15px;" href="GestionAdmins.php" class="button"> Gestion des Admins</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:15px;" href="ChangePassUser.php" class="button"> Changer MDP User</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:15px;" href="ChangePassAdmin.php" class="button"> Modifier MDP Admin</a>
            </div>

            <div class="button_font">
                <a style="text-decoration: none; margin-bottom:10px;" href="EditProfilAdmin.php" class="button"> Modifier Profil Admin</a>
            </div>

            <div class="deco">
                <a href="controllers/logout.php">Déconnexion </a>
            </div>
        </div>
    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>