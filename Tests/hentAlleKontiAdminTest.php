<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKontiAdminTest extends PHPUnit_Framework_TestCase {
    public function testhentAlleKontiOK(){
        
        //arrange
        $admin = new Admin(new AdminDBStub());
        //act
        $resultat=$admin->hentAlleKonti();
        //assert
        $this->assertEquals(2,count($resultat));
    }
    
    
     public function testHentAlleKonti_OK()
    {
        // arrange
        $admin = new Admin(new AdminDBStub());
        // act
        $konti = $admin->hentAlleKonti();
        // assert
        $this->assertEquals("12345678901", $konti[0]->personnummer);
        $this->assertEquals("123123123", $konti[0]->kontonummer);
        $this->assertEquals("2300.34", $konti[0]->saldo);
        $this->assertEquals("NOK", $konti[0]->valuta);
        $this->assertEquals("Lonnskonto", $konti[0]->type);
        
        $this->assertEquals("12345678901", $konti[1]->personnummer);
        $this->assertEquals("123123333", $konti[1]->kontonummer);
        $this->assertEquals("230000.00", $konti[1]->saldo);
        $this->assertEquals("NOK", $konti[1]->valuta);
        $this->assertEquals("Sparekonto", $konti[1]->type);
    }
}
    


