<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

</head>

<div class="container">
  <h2>Formulaire de contact</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $to = 'admin@votresite.com'; // e-mail de l'administrateur
  $subject = 'Nouveau message de contact';
  $message = 'Nom : ' . $_POST['name'] . "\r\n" .
             'Prénom : ' . $_POST['surname'] . "\r\n" .
             'E-mail : ' . $_POST['email'] . "\r\n" .
             'Message : ' . $_POST['message'] . "\r\n";
  $headers = 'From: ' . $_POST['email'] . "\r\n" .
             'Reply-To: ' . $_POST['email'] . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
  mail($to, $subject, $message, $headers);
  echo 'Votre message a été envoyé avec succès.';
}
?>
