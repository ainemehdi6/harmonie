<!DOCTYPE html>
<?php
    session_start();
    include_once('DAO.php');
    $dao=new DAO();

    if(isset($_GET['eventId']))
    {
      $eventId = $_GET['eventId'];
    }
    else header("location:EventsList.php?res=error");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Événement</title>
</head>
<body>
    <?php include_once('assets/models/header.html') ?>
    <main>
      <?php
        $event = $dao->EventById($eventId);
        foreach($event as $info)
        {
          echo'
            <h2 class="center-text">'.$info[1].'</h2>
            <p class="center-text">'.$info[2].'</p>
            <p class="center-text">'.$info[3].'</p>

          ';
        }
      ?>
        
        <table>
          <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Présence</th>
          </tr>
          <?php
          $listParticipants = $dao->listeParticipants($eventId);
          foreach($listParticipants as $participant)
          {
            echo'
              <tr>
                <td>'.$participant[3].'</td>
                <td>'.$participant[2].'</td>
                <td>
                    <a href="#'.$participant[0].'" class="button button-present">Présent</a>
                    <a href="#'.$participant[0].'" class="button button-absent">Absent</a>
                </td>
              </tr>

            ';
          }
          ?>
        </table>

    </main>
    <footer>

    </footer>
</body>

</html>