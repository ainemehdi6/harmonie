<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['idAdmin']))
    {
      header("location:loginAdmin.php?erreur=2");
    }
    include_once('DAO.php');
    $dao=new DAO();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Admin login</title>

</head>

<body>
<?php include_once('assets/models/headerAdmin.php') ?>

    <div class="container">
        <div class="main">
            <h1 class="title-one">Changer mot de passe User</h1>
            <form class="change-password" action="controllers/ChangePassUser.php" method="POST">
                <div class="input">
                    <input type="password" name="olduserpw" placeholder="Ancien MDP User">
                </div> <br>
                <div class="input">
                    <input type="password" name="newuserpassword" placeholder="Nouveau Mot de passe">
                </div> <br>
                <div class="input">
                    <input type="password" name="cnewuserpassword" placeholder="Confirmer Mot de passe">
                </div>
                <div class="button">
                    <button type="submit">Valider changement</button>
                </div>
        </div>
        </form>

</div>
    <?php include_once('assets/models/footer.html') ?>
</body>
<?php var_dump($_SESSION['idAdmin']);?>

</html>