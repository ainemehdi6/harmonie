<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Login page</title>

</head>

<body>
<?php include_once('assets/models/header.html') ?>

    <main>
        <div class="main">
            <h1>Connexion</h1>
            <form action="" method="POST">
                <div class="input">
                    <input type="text" name="code">
                </div>
                <div class="button">
                    <button>Se connecter</button>
                </div>
                
                <a href="" class="problem-link">Problème de <br><hr class="hr-footer"> connexion ?</a>
        </div>
        </form>

    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>