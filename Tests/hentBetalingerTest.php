<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit_Framework_TestCase{
    public function testPersonnummerOK(){
        $personnummer = 01010122344;
        $bank=new Bank(new BankDBStub());
        $betalinger = $bank->hentBetalinger($personnummer);
        $this->assertEquals(2,count($betalinger)); 
    }
    public function testPersonnummerFeil(){
        $personnummer = 20108824000;
        $bank=new Bank(new BankDBStub());
        $betalinger = $bank->hentBetalinger($personnummer);
        $this->assertEquals('Feil',$betalinger);
    }
}


