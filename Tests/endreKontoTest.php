<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';
//Hei Ira it's maja, just checking if the git is working

class endreKontoTest extends PHPUnit_Framework_TestCase{
    public function testCorrect(){
        $konto = new konto();
        $konto->personnummer = "01010110523";
        $konto->kontonummer ="105010123456";
        $konto->saldo = "520";
        $konto->type = "Lønnskonto";
        $konto->valuta = "NOK";
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->endreKonto($konto);
        
        $this->assertEquals(true, $result);
    }
    public function testWrong(){
        $konto = new konto();
        $konto->kontonummer ="105010123456";
        $konto->personnummer = "90";
        $konto->saldo = "520";
        $konto->type = "Lønnskonto";
        $konto->valuta = "NOK";
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->endreKonto($konto);
        
        $this->assertEquals(false, $result);
    }
}
