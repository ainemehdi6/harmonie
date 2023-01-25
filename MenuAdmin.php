<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['idAdmin']))
    {
      header("location:loginAdmin.php?erreur=2");
    }
    include_once('DAO.php');
    $dao=new DAO();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Accueil Admin</title>

</head>

<body>
<?php include_once('assets/models/header.html') ?>
    <main style="display:flex;">
        <div class="buttons" style="margin:50px auto 0 auto;">
            <div class="button_font">
                <a href="#" class="button" > Gestion des membres</a>
            </div>

            <div class="button_font">
                <a href="gestionEvents.php" class="button"> Gestion des évènements</a>
            </div>

            <div class="button_font">
                <a href="ChangePassUser.php" class="button"> Changer mdp User</a>
            </div>

            <div class="button_font">
                <a href="ChangePassAdmin.php" class="button"> Changer mdp Admin</a>
            </div>

            <div class="deco">
                <a href="controllers/logout.php">Déconnexion </a>
            </div>
        </div>
    </main>
    <br><br><br><br><br><br>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>