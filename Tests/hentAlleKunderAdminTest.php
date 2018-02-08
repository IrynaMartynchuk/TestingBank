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
}