<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
App::uses('BarcodeGeneratorHTML', 'Picqer/Barcodes');

/**
 * CakePHP PdfsController
 * @author Matus
 */
class PdfsController extends AppController {

    public $uses = array('UsedBarcode');
    public $components = array('RequestHandler');
    
    private $width = 1.25;
    private $height = 50;
    
    public function view($first, $last) {
        if (empty($first) || empty($last) || $first < 1 || $last < $first) {
            throw new InvalidArgumentException("id is null");
        }
        $barcodes = array();
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        for ($i = $first; $i < $last + 1; $i++) {
            $barcodeString = 'SAV' . sprintf("%07d", $i);
            //$barcode['Barcode']['bar'] = $generator->getBarcode($barcodeString, $generator::TYPE_CODE_128, $this->width, $this->height);
            $barcode['Barcode']['text'] = $barcodeString;
            $barcodes[] = $barcode;
        }
        ini_set('memory_limit', '256M');
        $settings['width'] = $this->width;
        $settings['height'] = $this->height;
        $this->set(compact('barcodes', 'settings'));
    }
    
    public function create($first, $last) {
        if (empty($first) || empty($last) || $first < 1 || $last < $first) {
            throw new InvalidArgumentException("id is null");
        }
        $barcodes = array();
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        for ($i = $first; $i < $last + 1; $i++) {
            $barcodeString = 'SAV' . sprintf("%07d", $i);
            $barcode['Barcode']['bar'] = $generator->getBarcode($barcodeString, $generator::TYPE_CODE_128, $this->width, $this->height);
            $barcode['Barcode']['text'] = $barcodeString;
            $barcodes[] = $barcode;
        }
        $this->set(compact('barcodes'));
    }

}
