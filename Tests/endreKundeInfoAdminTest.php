<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class endreKundeInfoAdminTest extends PHPUnit\Framework\TestCase{
    
    function testCorrectCustomerDetails(){
        
        $kunde = new kunde();
        $kunde->etternavn = "Kiszka";
        $kunde->adresse = "Thereses Gate";
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->endreKundeInfo($kunde);
        $this->assertEquals($result, "OK");
       
    }
    
    function testIncorrectCustomerDetails(){
        
        $kunde = new kunde();
        $kunde->etternavn = "Etternavn";
        $kunde->adresse = "";
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->endreKundeInfo($kunde);
        $this->assertEquals($result,"Wrong");
        
    }
    
}