<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKunderAdminTest extends PHPUnit_Framework_TestCase {
    public function testHentAlleKunderOK(){
        //arrange
        $admin = new Admin(new AdminDBStub());
        //act
        $alleKunder=$admin->hentAlleKunder();
        //assert
        $this->assertEquals(3, count($alleKunder));
    }
    
    public function testHentAlleKunder_OK2(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        // act
        $kunder = $admin->hentAlleKunder();
        // assert
        $this->assertEquals("01010122344", $kunder[0]->personnummer);
        $this->assertEquals("Per", $kunder[0]->fornavn);
        $this->assertEquals("Olsen", $kunder[0]->etternavn);
        $this->assertEquals("Osloveien 82", $kunder[0]->adresse);
        $this->assertEquals("1234", $kunder[0]->postnr);
        $this->assertEquals("Asker", $kunder[0]->poststed);
        $this->assertEquals("12345678", $kunder[0]->telefonnr);
        $this->assertEquals("HeiHeiHei",  $kunder[0]->passord);
        
        $this->assertEquals("01010122355", $kunder[1]->personnummer);
        $this->assertEquals("Line", $kunder[1]->fornavn);
        $this->assertEquals("Jensen", $kunder[1]->etternavn);
        $this->assertEquals("Askerveien 10", $kunder[1]->adresse);
        $this->assertEquals("4321", $kunder[1]->postnr);
        $this->assertEquals("Oslo", $kunder[1]->poststed);
        $this->assertEquals("92876789", $kunder[1]->telefonnr);
        $this->assertEquals("HeiHei2",  $kunder[1]->passord);
    }
}