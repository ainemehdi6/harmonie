<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location:loginAdmin.php?erreur=2");
}
if (isset($_GET['idEvent'])) {
    $idEvent = $_GET['idEvent'];
} else {
    header("location:GestionEvents.php?erreur=2");
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>évènement details</title>

</head>

<body>
<?php require('assets/models/navbar.php')?>
    <?php include_once('assets/models/headerAdmin.php') ?>


    <div class="texte">
        <?php
        $EventInfo = $dao->EventById($idEvent);
        foreach ($EventInfo as $info) {
            echo '
                <h1>' . $info[1] . '</h1>
                <h3>' . $info[2] . '</h2>
                <p>' . $info[3] . '</p>';
        }
        ?>
    </div>

    <main>
		<div class="btns-grp">
            <a href="GestionEvents.php" class="btn btn-main btn-primary"">Liste des événements</a>
        </div>
        <table class="table table-bordered thead-dark table-striped">
            <thead>
                <tr>

                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $ListPaticipant = $dao->listeParticipants($idEvent);
                foreach ($ListPaticipant as $Particip) {
                    echo '
                    <tr style="background-color:rgba(56, 255, 148, 0.3)">
                        <td>' . $Particip[1] . '</td>
                        <td>' . $Particip[2] . '</td>
                        <td>' . $Particip[3] . '</td>
                        <td>' . $Particip[4] . '</td>
                    </tr>';
                }
                $ListNonPaticipant = $dao->listeNonParticipants($idEvent);
                foreach ($ListNonPaticipant as $NonParticip) {
                    echo '
                    <tr style="background-color:rgba(255, 80, 56, 0.3)">
                        <td>' . $NonParticip[1] . '</td>
                        <td>' . $NonParticip[2] . '</td>
                        <td>' . $NonParticip[3] . '</td>
                        <td>' . $NonParticip[4] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </main>

    <?php include_once('assets/models/footer.html') ?>
</body>

</html>