<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location:loginAdmin.php?erreur=2");
}

$link = mysqli_connect('127.0.0.1','root','','harmonie');

if (isset($_POST['submit'])) {
    $filename = $_FILES['file']['tmp_name'];
    if ($_FILES['file']['size'] > 0) {
        $file = fopen($filename, 'r');
        $header = fgetcsv($file, 1000, ',');
        $num_fields = count($header);
        $sql = "INSERT INTO user (firstName, lastName, email, phoneNumber, role) VALUES (";
        $sql .= "'" . implode("','", $header) . "')";
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            $sql = "INSERT INTO user (firstName, lastName, email, phoneNumber, role) VALUES (";
            for ($i = 0; $i < $num_fields; $i++) {
                $sql .= "'" . $data[$i] . "',";
            }
            $sql = substr($sql, 0, -1) . ")";
            mysqli_query($link, $sql);
        }
        fclose($file);
        echo "Le fichier CSV a été importé avec succès !";
    } else {
        echo "Le fichier est vide.";
    }
}
?>
<html>
<head>
    <title>Importer un fichier CSV</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="file">Sélectionner un fichier CSV :</label>
            <input type="file" name="file" id="file">
            <br>
            <input type="submit" name="submit" value="Importer">
        </div>
    </form>
</body>
</html>