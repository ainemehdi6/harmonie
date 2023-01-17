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
    <title>Liste des utilisateurs</title>
</head>
<body>
    <?php include_once('assets/models/header.html') ?>
    <main>
        <h2 class="center-text">Liste des utilisateurs</h2>
      
        <table>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
          </tr>
          <?php 
            $listUsers = $dao->$listUsers();
            foreach($listUsers as $user){
              echo'
                <tr>
                  <td>'.$user[1].'</td>
                  <td>'.$user[2].'</td>
                  <td>'.$user[4].'</td>
                  <td>'.$user[3].'</td>
                </tr>';
            }
          ?>
        </table>

    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>