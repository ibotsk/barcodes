<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP BarcodesController
 * @author Matus
 */
class BarcodesController extends AppController {

    public $uses = array('UsedBarcode');

    public function home() {
        $barcodes = $this->UsedBarcode->findAll();
        $this->set(compact('barcodes'));
    }

    public function create() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $lastUsed = $this->UsedBarcode->last();
            if ($lastUsed < 1) {
                $this->Flash->error(__('Barcodes request could not be created - unknown last used barcode'));
                $this->redirect('/barcodes/home');
            }
            //determine new range
            $first = $lastUsed + 1;
            $last = $lastUsed + intval($data['UsedBarcode']['count']);
            $range = 'SAV' . sprintf('%07d', $first) . ' - SAV' . sprintf('%07d', $last);
            
            $data['UsedBarcode']['first'] = $first;
            $data['UsedBarcode']['last'] = $last;
            $data['UsedBarcode']['barcode_range'] = $range;
            
            $this->UsedBarcode->save($data);
            $this->redirect('/barcodes/home');
        }
    }
    
}
