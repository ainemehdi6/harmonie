<?php
        $name = $dao->getFirstName($_SESSION['idAdmin']); 
    ?>
<header>
    <div class="header_top">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <img src="assets/images/logo.jpeg" alt="logo Harmonie">
        <a id="mobile-menu" href="MenuAdmin.php"><i class="fa-sharp fa-solid fa-bars"></i></a>
    </div>
    <div class="header_txt">
        <h2>Bienvenue <?php echo $name;?></h2>
    </div>
</header>
<hr>
