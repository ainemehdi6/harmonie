<?php
session_start();
include_once('DAO.php');
$dao = new DAO();

if (isset($_GET['eventId'])) {
  $eventId = $_GET['eventId'];
} else header("location:EventsList.php?res=error");
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
  <title>Événement</title>
</head>

<body>
  <?php include_once('assets/models/header.html') ?>
  <main>
    <?php
    $event = $dao->EventById($eventId);
    foreach ($event as $info) {
      echo '
            <h2 class="center-text event-titre">' . $info[1] . '</h2>
            <p class="center-text event-descrip">' . $info[2] . '</p>
            <p class="center-text event-date">' . $info[3] . '</p>

          ';
    }
    ?>

    <div class='two_buttons'>
      <div class="btns-grp">
        <a href="EventsList.php" class="btn btn-main">Liste des événements</a>
      </div>
      <div class="btns-grp">
        <a href="EventUserList.php" class="btn btn-main">Liste des membres</a>
      </div>

    

    </div>
<<<<<<< HEAD
    <div class="wrapper">
=======
<div class="wrapper">
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Présence</th>
      </tr>
            <?php
      $listeUsers = $dao->listeUsers();
      foreach ($listeUsers as $user) {
        echo '
              <tr id="' . $user[0] . '">
                <td>' . $user[2] . '</td>
                <td>' . $user[1] . '</td>';
        if (!$dao->UserIsPresent($user[0], $eventId) == "0") {
          echo '
                <td style="height:40px">
<<<<<<< HEAD
                  <a style="color: currentColor;cursor: not-allowed;text-decoration: none; background-color:green; border:green;color:white;" class="btn btn-present">Présent</a>
                  <a href="controllers/markPresence.php?userId=' . $user[0] . '&eventId=' . $eventId . '&page=EventPage&type=abs" class="btn btn-absent" style="text-decoration: none; background-color:grey; border:none;color:white;">Absent</a>
                </td>';
        } else {
          echo '
                <td style="height:40px">
                  <a class="btn btn-absent" href="controllers/markPresence.php?userId=' . $user[0] . '&eventId=' . $eventId . '&page=EventPage&type=present" style="text-decoration: none; background-color:grey; border:none;color:white;">Présent</a>
                  <a role="link" aria-disabled="true" style="color: currentColor;cursor: not-allowed;text-decoration: none; background-color:red; border:red;color:white;" class="btn btn-present">Absent</a>
                </td>';
        }
        echo '</tr>
=======
                    
                    
                    <a ';
        if ($dao->UserIsPresent($user[0], $eventId) == "0") {
          echo 'href="controllers/markPresence.php?userId=' . $user[0] . '&eventId=' . $eventId . '&page=EventPage&type=present"';
        } else {
          echo 'href=""  role="link" aria-disabled="true" style="color: currentColor;cursor: not-allowed;opacity: 0.5;text-decoration: none; background-color:green; border:green;color:white;"';
        };
        echo 'class="btn btn-present">Présent</a>
                    <a href="controllers/markPresence.php?userId=' . $user[0] . '&eventId=' . $eventId . '&page=EventPage&type=abs" class="btn btn-absent"';
        echo '>Absent</a>
     
       
                </td>
              </tr>
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8

            ';
      }
      ?>
    </table>
<<<<<<< HEAD
  </div>
=======
 </div>
>>>>>>> 0a420e6451be4b172bc253620dc7a9fe5ac080f8
  </main>
  <?php include_once('assets/models/footer.html') ?>
</body>

</html>