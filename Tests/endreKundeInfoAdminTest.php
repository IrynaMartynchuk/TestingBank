<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class endreKundeInfoAdminTest extends PHPUnit\Framework\TestCase{
    
        $kunde = new kunde();
        $kunde->adresse = "Thereses Gate";
        $kunde->etternavn = "Kiszka";
        $kunde->fornavn = "Maja";
        $kunde->passord = "blabla";
        $kunde->personnummer = 11111111111;
        $kunde->postnr = 0452;
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = 23456789;
        
        $admin = new Admin(new AdminDBStub());
        
        $result = $admin->endreKundeInfo($kunde);
        
        $this->assertEquals($result, "OK");
    
}