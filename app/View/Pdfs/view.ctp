<style type="text/css">
    :root{-webkit-print-color-adjust:exact}
    * { margin: 0; padding: 0;}
    
    #main { width: 800px; }
    .barcode { 

        width: 190px;
        border: 1px dotted #000;
        border-top: none;
        border-left: none;
        margin-right: -1px;
        padding: 5px 10px 5px 10px;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        font-weight: normal;
        color: #000;
        float: left;
    }
    .barcode .text {
        margin-left: 40px;
    }

    .barcode-container {
        display: block;
        clear: both;
    }
</style>

<div id="main">
    <?php
    
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    $i = 0;
    foreach ($barcodes as $b):

        if ($i % 4 == 0) {
            echo '<div class="barcode-container">';
        }
        $bar = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($b['Barcode']['text'], $generator::TYPE_CODE_128, $settings['width'], $settings['height'])) . '">';
        ?>

        <div class="barcode">
            <div class="bars">
                <?php echo $bar; ?>
            </div>
            <div class="text">
                <?php echo $b['Barcode']['text']; ?>
            </div>
        </div>

        <?php
        if ($i % 4 == 3) {
            echo '</div>';
        }
        $i++;
    endforeach;
    ?>
</div>