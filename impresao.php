<?php

use Dompdf\Dompdf;

require_once 'vendor/autoload.php';

$dompdf = new Dompdf();

ob_start();
require "relatorio.php";
$dompdf->loadHtml(ob_get_clean());


$dompdf->setPaper("A4");
$dompdf->render();
$dompdf->stream("file.pdf",["Attachment" => false]);
?>