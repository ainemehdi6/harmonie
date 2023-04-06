<?php
require 'IOFactory.php';

$fileName = 'criteres_notations_rapports_de_stage.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($fileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

print_r($sheetData);
?>