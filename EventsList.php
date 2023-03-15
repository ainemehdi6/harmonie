<?php
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
    <title>Liste des événements</title>
</head>
<body>
    <?php include_once('assets/models/header.html') ?>
    <main>
        <h2 class="center-text">Liste des événements</h2>
        <div class="btns-grp">
            <a href="EventUserList.php" class="btn btn-main">Liste des événements par nom</a>
        </div>
        <div class="wrapper">
        <table>
          <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Description</th>
          </tr>
          <?php 
            $listEvent = $dao->listeEvents();
            foreach($listEvent as $event){
              echo'
                <tr>
                  <td><a href="EventPage.php?eventId='.$event[0].'">'.$event[3].'</a></td>
                  <td><a href="EventPage.php?eventId='.$event[0].'">'.$event[1].'</a></td>
                  <td><a href="EventPage.php?eventId='.$event[0].'">'.$event[2].'</a></td>
                </tr>';
            }
          ?>
        </table>
        </div>
    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>