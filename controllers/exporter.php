<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location:loginAdmin.php?erreur=2");
}

$link = mysqli_connect('harmonie_db','harmonie','>{G4c(CzYhB*','base');
$sql = "SELECT * FROM user";

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $delimiter = ",";
        $filename = "ListeUsers-" . date('Y-m-d') . ".csv";

        // Create a file pointer 
        $f = fopen('php://memory', 'w');
        // Set column headers 
        $fields = array('idUser', 'firstName', 'lastName', 'email', 'phoneNumber', 'role');
        fputcsv($f, $fields, $delimiter);

        // Output each row of the data, format line as csv and write to file pointer 
        while ($row = mysqli_fetch_assoc($result)) {
            $lineData = array($row['idUser'], $row['firstName'], $row['lastName'], $row['email'], $row['phoneNumber'], $row['role']);
            fputcsv($f, $lineData, $delimiter);
        }

        // Move back to beginning of file 
        fseek($f, 0);

        // Set headers to download file rather than displayed 
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download  
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        //output all remaining data on a file pointer 
        ob_end_clean(); //required here or large files will not work
        fpassthru($f);
        exit();
    } else {
        echo 'Aucun utilisateur trouvé';
    }
} else {
    echo 'Aucun utilisateur trouvé';
}

exit();

?>