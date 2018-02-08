<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';


class endreKundeInfoTest extends PHPUnit_Framework_TestCase{
    
    public function testCorrectChange(){
        
        $kunde = new kunde();
        $kunde->adresse = "Thereses Gate";
        $kunde->etternavn = "Kiszka";
        $kunde->fornavn = "Maja";
        $kunde->passord = "blabla";
        $kunde->personnummer = 11111111111;
        $kunde->postnr = 0452;
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = 23456789;
        
        $bank = new Bank(new BankDBStub());
        
        $result = $bank->endreKundeInfo($kunde);
        
        $this->assertEquals($result, "OK");
    }
    
    public function testIncorrectChange(){
        
        $kunde = new kunde();
        $kunde->adresse = "Thereses ";
        $kunde->etternavn = "Kia";
        $kunde->fornavn = "Maja";
        $kunde->passord = "blabla";
        $kunde->personnummer = 11111111111;
        $kunde->postnr = 0452;
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = 23456789;
        
        $bank = new Bank(new BankDBStub());
        
        $result = $bank->endreKundeInfo($kunde);
        
        $this->assertEquals($result, "Wrong");
    }
}