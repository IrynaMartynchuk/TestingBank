<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class registrerKontoAdminTest extends PHPUnit\Framework\TestCase{
    
    function testRegistrationSuccessful() {
        
        $konto = new konto();
        $konto->personnummer = "11111111111";
        
        $admin = new Admin(new AdminDBStub());
        $result = $admin->registrerKonto($konto);
        
        $this->assertEquals($result, "OK");
    }
    
    function testRegistrationUnsuccessful(){
        
        $konto = new konto();
        $konto->personnummer = "123";
        
        $admin = new Admin(new AdminDBStub());
        $result = $admin->registrerKonto($konto);
        
        $this->assertEquals($result, "Wrong!");
        
    }
    
    
}