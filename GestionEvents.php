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
    
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <title>Gestion des événements</title>
</head>
<body>
    <style>

    </style>
    <?php include_once('assets/models/header.html') ?>
    <main>
        <h1 class="center-text">Gestion des évènements</h1>
        <div class="btns-grp">
            <a href="#" class="btn btn-main" onclick="AddEventBoxOn()">Ajouter</a>
            <a href="#" class="btn btn-main">Modifier</a>
        </div>
        <table >
            <tr>
                <th>Date</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Nbr de participants</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input type="text" name="date" value="21/04/2023"></td>
                <td><input type="text" name="titre" value="Premier événement"></td>
                <td><input type="text" name="descriptin" value="description de l'évenement"></td>
                <td>
                    <select name="statut">
                        <option value="0">Encours</option>
                        <option value="1">Suspendu</option>
                        <option value="2">Terminer</option>
                    </select>
                </td>
                <td>12/20</td>
                <td><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i class="fa-solid fa-eye"></i></a></td>
            </tr>
        </table>
    </main>
    <div class="post-popup job_post active" id="job_post">
			<div class="post-project">
				<h3>Ajouter une évenement</h3>
				<div class="post-project-fields">
					<form action="controllers/addpost.php" method="post" enctype="multipart/form-data"> 
						<div class="row">
							<div class="col-lg-12">
								<input type="text" name="title" placeholder="Title">
							</div>
							<div class="col-lg-12">
								<textarea name="description"  placeholder="Description"></textarea>
							</div>
							<div class="col-lg-12">
								<p>Image</p>
								<input type="file" name="image" id="image">
							</div>
							<div class="col-lg-12">
								<ul>
									<li><input  class="active" name="submit" type="submit" value="post"></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
    <?php include_once('assets/models/footer.html') ?>
</body>
</html>    