<?php
    include_once('DAO.php');
    $dao=new DAO();
    if(isset($_GET['userId'])){
        $userId=$_GET['userId'];
    }
    else if(isset($_GET['user'])){
        $userId=$_GET['user'];
    }
    
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
       <h2 class="center-text"><?php $name = $dao->getFirstNameAndLastName($userId);
       echo $name; ?></h2>
        <div class="btns-grp">
            <a href="EventUserList.php" class="btn btn-main">Liste des événements par nom</a>
        </div>
        <div class="wrapper">
        <table>
          <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Présence</th>
          </tr>
          <?php 
            $listEvent = $dao->listeEvents();
            foreach($listEvent as $event){
              echo'
                <tr>
                  <td>'.$event[3].'</td>
                  <td>'.$event[1].'</td>
                  <td>'.$event[2].'</td>
                  <td>  
                    <a ';if($dao->UserIsPresent($userId,$event[0])=="0"){echo 'href="controllers/markPresence.php?userId='.$userId.'&eventId='.$event[0].'&page=markPresencebyName&type=present"';}else{echo'href=""  role="link" aria-disabled="true" style="color: currentColor;cursor: not-allowed;opacity: 0.5;text-decoration: none; background-color:green; border:green;color:white;"';};  echo'class="btn btn-present">Présent</a>
                    <a href="controllers/markPresence.php?userId='.$userId.'&eventId='.$event[0].'&page=markPresencebyName&type=abs" class="btn btn-absent"';  echo'>Absent</a>
                </td>
                </tr>';
            }
          ?>
        </table>
        </div>

    </main>
    <?php include_once('assets/models/footer.html') ?>
</body>

</html>