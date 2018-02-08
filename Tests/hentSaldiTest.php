<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit_Framework_TestCase{
    public function testWithCorrectPersonnr(){
        $personnr = 01010122344;
        $bank=new Bank(new BankDBStub());
        $saldo = $bank->hentSaldi($personnr);
        $this->assertEquals(2300.34,$saldo); 
    }
    public function testWithWrongPersonnr(){
        $personnr = 20108824000;
        $bank=new Bank(new BankDBStub());
        $saldo = $bank->hentSaldi($personnr);
        $this->assertEquals("Mistake",$saldo);
    }
   
}
