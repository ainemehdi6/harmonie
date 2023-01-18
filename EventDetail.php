<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['idAdmin']))
    {
      header("location:../loginAdmin.php?erreur=2");
    }
    if(isset($_GET['idEvent']))
    {
      $idEvent=$_GET['idEvent'];
    }
    else{
        header("location:../GestionEvents.php?erreur=2");
    }
    include_once('DAO.php');
    $dao=new DAO();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>évènementdetails</title>

</head>

<body>
    
    <?php include_once('assets/models/header.html') ?>
     
    
  <div class="texte">
            <?php 
                $EventInfo = $dao->EventById($idEvent);
                foreach($EventInfo as $info){
                echo'
                <h1>'.$info[1].'</h1>
                <h3>'.$info[2].'</h2>
                <p>'.$info[3].'</p>';
                }
            ?>
    </div>

    <main>
      
        <table>
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
                foreach($ListPaticipant as $Particip){
                    echo'
                    <tr>
                        <td>'.$Particip[2].'</td>
                        <td>'.$Particip[3].'</td>
                        <td>'.$Particip[4].'</td>
                        <td>'.$Particip[5].'</td>
                    </tr>';
                }
            ?>
            </tbody>
        </table>
    </main>
    
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>