<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location:loginAdmin.php?erreur=2");
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'harmonie');

if (isset($_POST['submit'])) {
    $filename = $_FILES['file']['tmp_name'];
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ($_FILES['file']['size'] > 0 && strtolower($ext) === 'csv') {
        $file = fopen($filename, 'r');
        $header = fgetcsv($file, 1000, ',');
        $num_fields = count($header);
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            $sql = "INSERT IGNORE INTO user (idUser,firstName, lastName, email, phoneNumber, role, pupitre) VALUES (";
            for ($i = 0; $i < $num_fields; $i++) {
                $sql .= "'" . $data[$i] . "',";
            }
            $sql = substr($sql, 0, -1) . ")";

            mysqli_query($link, $sql);
        }
        fclose($file);
        header("location:../UsersList.php");
    } else {
        header("location:../UsersList.php?ErrorFileType=true");
    }
}
