<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
    <title>User login</title>

</head>



<body>
    <header>
        <div class="header_top">
            <img src="assets/images/logo.jpeg" alt="logo Harmonie">
            <div class="btns-grp">
                <a class='btn btn-main' href="loginAdmin.php">Login Admin</a>
            </div>
        </div>
        <div class="header_txt">
            <h2>Bienvenue</h2>
        </div>
    </header>
    <hr>
    <div class="container">
        <div class="main">
            <h1 class="title" style="text-align:center">Se connecter en tant que membre</h1>
            <form action="controllers/loginUser.php" method="POST">
                <label style="width:300px;margin:auto">
                    <input class="label-info" type="password" name="password" placeholder="Entrer le mot de passe">
                    <div class="password-icon">
                        <i data-feather="eye"></i>
                        <i data-feather="eye-off"></i>
                    </div>
                </label>
                <div class="button" style="margin:auto">
                    <button type="submit">Se connecter</button>
                </div>

                <a href="FormContactAdmin.php" class="problem-link">Problème de <br> connexion ?</a>
            </form>
        </div>


    </div>
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