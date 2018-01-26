<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class registrerKundeTest extends PHPUnit_Framework_TestCase{
    public function testCorrectInput(){
        
        $kunde = new kunde();
        $kunde->personnummer = "20108824000";
        $kunde->fornavn = "Iryna";
        $kunde->etternavn = "Martynchuk";
        $kunde->adresse = "Wilses gate 3b, L303";
        $kunde->postnr = "0178";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "92120940";
        $kunde->passord = "123456";
        $admin = new Admin(new AdminDBStub);
        $result = $admin->registrerKunde($kunde);
        $this->assertEquals(true, $result);
    }
    
    public function testWrongInput(){
        $kunde = new kunde();
        $kunde->personnummer = "0";
        $kunde->fornavn = "Iryna";
        $kunde->etternavn = "Martynchuk";
        $kunde->adresse = "Wilses gate 3b, L303";
        $kunde->postnr = "0178";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "92120940";
        $kunde->passord = "123456";
        $admin = new Admin(new AdminDBStub);
        $result = $admin->registrerKunde($kunde);
        $this->assertEquals(false, $result);
    }
    public function testEmpty(){
        $kunde = new kunde();
        $admin = new Admin(new AdminDBStub);
        $result = $admin->registrerKunde($kunde);
        $this->assertEquals(false, $result);
    }
}

