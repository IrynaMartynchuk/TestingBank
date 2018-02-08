<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit_Framework_TestCase{
    
    public function testhentKontiPersonnrOK(){
        //arrange
        $personnummer = 01010110523; 
        $bank=new Bank(new BankDBStub());
        //act
        $konto = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals(105010123456,$konto[0]->kontonummer);
        $this->assertEquals(105010123499,$konto[1]->kontonummer);
    }
    
    //or 
    
    public function testhentKontiOK(){
        //arrange
        $personnummer = 01010110523; 
        $bank=new Bank(new BankDBStub());
        //act
        $konto = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals(2,count($konto));
    }
   
    public function testhentKontiPersonnrFeil(){
        //arrange
        $personnummer = 0000000000; 
        $bank=new Bank(new BankDBStub());
        //act
        $konto = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals(" ",$konto[0]);
    }
}

