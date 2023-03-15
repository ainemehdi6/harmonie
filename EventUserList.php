<?php
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
  <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/jpg" href="assets/images/favicon.JPG" />
  <title>Liste des événements</title>
</head>

<body>
  <?php include_once('assets/models/header.html') ?>
  <main>
    <h2 class="center-text">Liste des Membres</h2>
    <div class="btns-grp">
      <a href="eventsList.php" class="btn btn-main">Liste des événements</a>
    </div>
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
      </tr>
      <?php
      $listUsers = $dao->listeUsers();
      foreach ($listUsers as $user) {
        echo '
                <tr>
                  <td><a href="markPresenceByName.php?userId=' . $user[0] . '">' . $user[2] . '</a></td>
                  <td><a href="markPresenceByName.php?userId=' . $user[0] . '">' . $user[1] . '</a></td>
                </tr>';
      }
      ?>
    </table>

  </main>
  <?php include_once('assets/models/footer.html') ?>
</body>

</html>