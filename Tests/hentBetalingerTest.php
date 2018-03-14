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
    
    //or 
    
    public function testhentBetalinger_OK(){
        // arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = 01010122344;
        // act
        $transaksjon = $bank->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("22342344556", $transaksjon[0]->fraTilKontonummer);
        $this->assertEquals("134.45", $transaksjon[0]->transaksjonBelop);
        $this->assertEquals("2015-03-26", $transaksjon[0]->dato);
        $this->assertEquals("Meny Holtet", $transaksjon[0]->melding);   
    }
    
    
    public function testPersonnummerFeil(){
        $personnummer = 20108824000;
        $bank=new Bank(new BankDBStub());
        $betalinger = $bank->hentBetalinger($personnummer);
        $this->assertEquals(" ",$betalinger[0]);
    }
}


