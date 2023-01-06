<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include_once('DAO.php');
    $dao=new DAO();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Gestion des événements</title>
</head>
<body>
    <?php include_once('assets/models/header.html') ?>
    <main>
        <h1 class="center-text">Gestion des évènements</h1>
        <div class="btns-grp">
            <a href="#" class="button btn-main">Ajouter</a>
            <a href="#" class="button btn-main">Modifier</a>
        </div>
        <table>

        </table>
    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>
</html>    