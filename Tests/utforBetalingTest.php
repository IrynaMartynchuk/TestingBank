<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class utforBetalingTest extends PHPUnit_Framework_TestCase{
    public function testCorrectInput(){
        $TxID = 7;
        $bank = new Bank(new BankDBStub());
        $result = $bank->utforBetaling($TxID);
        $this->assertEquals(true, $result);
    }
    
    public function testInvalidInput(){
        $TxID = 6;
        $bank = new Bank(new BankDBStub());
        $result = $bank->utforBetaling($TxID);
        $this->assertEquals(false, $result);
    }
    
    public function testNoInput(){
        $bank = new Bank(new BankDBStub());
        $result = $bank->utforBetaling(" ");
        $this->assertEquals(false, $result);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

