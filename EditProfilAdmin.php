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
    <title>Admin profil</title>

</head>

<body>
<?php require('assets/models/navbar.php')?>

    <?php include_once('assets/models/headerAdmin.php') ?>

    <div class="container">
        <div class="main">
            <h1>Modification Profil Admin</h1>
            <?php
            $infoAdmin = $dao->getAdminProfil($_SESSION['idAdmin']);
            foreach ($infoAdmin as $info) {
                echo '<form class="change-password" action="controllers/EditProfilAdmin.php" method="POST">
                <div class="input">
                        <input type="hidden" name="idAdmin" value="' . $info[0] . '">
                        <input class="input-form-editprofiladmin" type="text" name="oldfirstname" placeholder="Prénom Admin" value="' . $info[1] . '">
                    </div> <br>
                    <div class="input">
                        <input class="input-form-editprofiladmin" type="text" name="oldlastname" placeholder="Nom Admin" value="' . $info[2] . '">
                    </div> <br>
                    <div class="input">
                        <input class="input-form-editprofiladmin" type="text" name="oldemail" placeholder="email Admin" value="' . $info[3] . '">
                    </div> <br>
                    <div class="input">
                        <input class="input-form-editprofiladmin" type="text" name="oldphonenumber" placeholder="téléphone Admin" value="' . $info[4] . '">
                    </div>                    
                    <div class="button-editprofiladmin" class="button">
                        <button type="submit">Valider changement</button>
                    </div>
            </div>
            </form>';
            }
            ?>


        </div>
        <?php include_once('assets/models/footer.html') ?>
</body>

</html>
<?php var_dump($_SESSION['idAdmin']);
