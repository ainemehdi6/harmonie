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
            <h2 class="center-text event-titre">'.$info[1].'</h2>
            <p class="center-text event-descrip">'.$info[2].'</p>
            <p class="center-text event-date">'.$info[3].'</p>

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
           $listeUsers = $dao->listeUsers();
          foreach($listeUsers as $user)
          {
            echo'
              <tr>
                <td>'.$user[3].'</td>
                <td>'.$user[2].'</td>
                <td>
                    <a href="#'.$user[0].'" class="btn btn-present">Présent</a>
                    <a href="#'.$user[0].'" class="btn btn-absent">Absent</a>
                </td>
              </tr>

            ';
          }
          ?>
        </table>

    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>
</html>