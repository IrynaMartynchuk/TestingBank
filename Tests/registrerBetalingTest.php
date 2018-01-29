<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit\Framework\TestCase{
    /////CONTINUE
    public function testPaymentRegisteredOK(){
        
        //Arrange
        $kontoNr = "1234567890";
        $bank = new Bank(new BankDBStub());
        $konto = new konto();
        $konto->personnummer = "00000000000";
        $konto->kontonummer = $kontoNr;
        $konto->saldo = 999.99 ;
        $konto->type = "Spare";
        $konto->valuta = "NOK";
        $transaksjoner = array();
        
        $transaksjon1 = new transaksjon();
        $transaksjon1->avventer = 1;
        $transaksjon1->fraTilKontonummer = "0099887766";
        $transaksjon1->belop = 500;
        $transaksjon1->melding="message";
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
       
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        
        //Act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //Assert
        $this->assertEquals("OK", $result);
        
    }
    
    public function testPaymentRegisteredWrong() {
        
        //Arrange
        $kontoNr = "127890";
        $bank = new Bank(new BankDBStub());
        $konto = new konto();
        $konto->personnummer = "00000000000";
        $konto->kontonummer = $kontoNr;
        $konto->saldo = 999.99 ;
        $konto->type = "Spare";
        $konto->valuta = "NOK";
        $transaksjoner = array();
        
        $transaksjon1 = new transaksjon();
        $transaksjon1->avventer = 1;
        $transaksjon1->fraTilKontonummer = "0099887766";
        $transaksjon1->belop = 500;
        $transaksjon1->melding="melding";
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
        
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        
        $this->assertEquals("Wrong!", $result);
        
    }
    
    
}
