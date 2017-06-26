<?php

$dompdf = new Dompdf\Dompdf();
$dompdf->set_paper = 'A4';
$dompdf->set_option('defaultFont', 'Helvetica');
$dompdf->load_html(utf8_decode($content_for_layout), Configure::read('App.encoding'));
$dompdf->render();
echo $dompdf->output();
