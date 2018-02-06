<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentAlleKunderTest extends PHPUnit_Framework_TestCase {
    public function testhentAlleKunderOK(){
        //arrange
        $bank=new Bank(new BankDBStub());
        //act
        $alleKunder=$bank->hentAlleKunder();
        //assert
        $this->assertEquals(3, count($alleKunder));
    }
}


