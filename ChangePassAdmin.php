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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
    <title>Admin login</title>

</head>

<body>
    
<?php include_once('assets/models/headerAdmin.php') ?>

    <div class="container">
        <div class="main">
            <h1 class="title-one">Changer mot de passe Admin</h1>
            <form class="change-password" action="controllers/ChangePassAdmin.php" method="POST">
            <label>
            <input class="label-info" type="password" name="oldpass" placeholder="Ancien MDP Admin">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
            <br>
            <label>
            <input class="label-info" type="password" name="newpass" placeholder="Nouveau Mot de passe">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
            <br>
            <label>
            <input class="label-info" type="password" name="cpass" placeholder="Confirmer Mot de passe">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
                <!--<div class="input">
                    <input class="label-info" type="password" name="oldpass" placeholder="Ancien MDP Admin">
                </div> <br>
                <div class="input">
                    <input class="label-info" type="password" name="newpass" placeholder="Nouveau Mot de passe">
                </div> <br>
                <div class="input">
                    <input class="label-info" type="password" name="cpass" placeholder="Confirmer Mot de passe">
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

</html>
<?php var_dump($_SESSION['idAdmin']);