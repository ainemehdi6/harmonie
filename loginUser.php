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
            <a href="loginAdmin.php"><i class="fa-solid fa-gear"></i></a>
        </div>
        <div class="header_txt">
            <h2>Bienvenue</h2>
        </div>
    </header>
    <hr>
    <div class="container">
        <div class="main">
            <h1 class="title">Connexion</h1>
            <form action="controllers/loginUser.php" method="POST">
                <div class="input">
                    <input type="password" name="password" placeholder="Entrer le mot de passe">
                </div>
                <div class="button" style="margin:auto">
                    <button type="submit">Se connecter</button>
                </div>

                <a href="" class="problem-link">Problème de <br> connexion ?</a>
            </form>
        </div>


    </div>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>