<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP UsedBarcode
 * @author Matus
 */
class UsedBarcode extends AppModel {
 
    public function findAll() {
        return $this->find('all');
    }
    
    public function last() {
        $last = $this->find('first', array('fields' => ('MAX(last) as last_used')));
        if (!empty($last)) {
            return $last[0]['last_used'];
        }
        return -1;
    }
    
}
