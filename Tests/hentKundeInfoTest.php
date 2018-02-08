<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class hentKundeInfoTest extends PHPUnit_Framework_TestCase{
    public function testhentKundeInfoPersonnummerOK(){
        //arrange
        $personnummer = 01010110523; 
        $bank=new Bank(new BankDBStub());
        //act
        $kunde = $bank->hentKundeInfo($personnummer);
        //assert
        $this->assertEquals('Maria',$kunde->fornavn);
        $this->assertEquals('Mikhaylova',$kunde->etternavn);
        $this->assertEquals('Ookern Torgvei 92',$kunde->adresse);
        $this->assertEquals(1177,$kunde->postnr);
        $this->assertEquals(45654654,$kunde->telefonnr);
        $this->assertEquals('HeiHei',$kunde->passord);
        $this->assertEquals('Oslo',$kunde->poststed);  
    }
    
    public function testhentKundeInfoPersonnummerFeil(){
     $personnummer = 01010110000; 
        $bank=new Bank(new BankDBStub());
        //act
        $kunde = $bank->hentKundeInfo($personnummer);
        //assert
        $this->assertEquals('Feil',$kunde);
    }
}


