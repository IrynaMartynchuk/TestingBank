<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKontiAdminTest extends PHPUnit\Framework\TestCase {
    public function testhentAlleKontiOK(){
        
        //arrange
        $admin = new Admin(new AdminDBStub());
        //act
        $resultat=$admin->hentAlleKonti();
        //assert
        $this->assertEquals(2,count($resultat));
    }
}

