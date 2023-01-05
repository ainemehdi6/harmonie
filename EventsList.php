<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('DAO.php');
    $dao=new DAO();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Liste des événements</title>
</head>
<body>
    <?php include('assets/models/header.html') ?>
    <main>
        <h2 class="center-text">Liste des événements</h2>
      
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
                  <td>'.$event[3].'</td>
                  <td>'.$event[1].'</td>
                  <td>'.$event[2].'</td>
                </tr>';
            }
          ?>
        </table>

    </main>
    <footer>

    </footer>
</body>

</html>