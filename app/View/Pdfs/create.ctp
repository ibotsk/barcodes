<?php

foreach ($barcodes as $b):
    
    echo $this->element('barcode', array('barcode' => $b['Barcode']['bar'], 'text' => $b['Barcode']['text']));

endforeach;
