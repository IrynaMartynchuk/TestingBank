<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class slettKontoAdminTest extends PHPUnit_Framework_TestCase{
    
    function testAccountSuccessfullyDeleted(){
        
        $konto = new konto();
        $konto->kontonummer = "1234567890";
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->slettKonto($konto->kontonummer);
        $this->assertEquals($result, "OK");
        
    }
    
    function testAccountUnsuccessfullyDeleted(){
        
        $konto = new konto();
        $konto->kontonummer = "123";
        
        $admin = new Admin(new AdminDBStub());
        $result = $admin->slettKonto($konto->kontonummer);
        
        $this->assertEquals($result, "Feil");
        
        
    }
    
    
}