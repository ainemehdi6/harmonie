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
    <header>
        <div class="header_top">
            <img src="assets/images/logo.jpeg" alt="logo Harmonie">
            <a href="loginUser.php"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="header_txt">
            <h2>Bienvenue</h2>
        </div>
    </header>
    <hr>
    <div class="container">
        <div class="main">
            <h1>Connexion</h1>
            <form action="controllers/loginAdmin.php" method="POST">
                <div class="input">
                    <label >
                    <input class="label-info" type="text" name="email" placeholder="Email">
                    </label>
                </div> <br>
                <label>
            <input class="label-info" type="password" name="password" placeholder="Mot de passe">
            <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            </div>
            </label>
                <!--<div class="input">
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>-->
                <div class="button">
                    <button type="submit">Se connecter</button>
                </div>

                <a href="#" class="link-problem">Problème de <br> connexion ?</a>
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