<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit_Framework_TestCase{
    
    public function testCorrectBankAccount(){
        
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
    
    public function testWrongBankAccount() {
        
        //Incorrect bank account number - but correct message
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
        $transaksjon1->melding="message";
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
        
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        //act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
        
    }
    
    public function testCorrectTransaction(){
        //Arrange
        $kontoNr = "1234567890";   //correct account nr
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
        $transaksjon1->melding="message";  //correct message
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
       
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        
        //Act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //Assert
        $this->assertEquals("OK", $result);
    }
    
    public function testIncorrectTransaction(){
        //Arrange
        $kontoNr = "123"; //incorrect bank number
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
        $transaksjon1->melding="message"; //correct message
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
        
        $transaksjon2 = new transaksjon();
        $transaksjon2->avventer = 0;
        $transaksjon2->fraTilKontonummer="1122334455";
        $transaksjon2->belop=66.99;
        $transaksjon2->melding = "wrong message"; //incorrect message
        $transaksjon2->dato="11-11-2017";
        $transaksjoner [] = $transaksjon2;
        
        
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        $secondTransaksjon = $konto->transaksjoner[1];
        //Act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        $secondResult = $bank->registrerBetaling($kontoNr, $secondTransaksjon);
        //Assert
        $this->assertEquals("Feil", $result);
        $this->assertEquals("Feil", $secondResult);
        
    }
    
    public function testNegativeBelop(){
        
        //Arrange
        $kontoNr = "1234567890";   //correct account nr
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
        $transaksjon1->belop = -500;
        $transaksjon1->melding="message"; 
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
       
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        
        //Act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //Assert
        $this->assertEquals("Feil", $result);
        
    }
    
    public function testZeroBelop(){
        
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
        $transaksjon1->belop = 0;
        $transaksjon1->melding="message"; 
        $transaksjon1->dato="12-05-17";
        $transaksjoner [] = $transaksjon1;
       
        $konto->transaksjoner = $transaksjoner;
        $transaksjon = $konto->transaksjoner[0];
        
        //Act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //Assert
        $this->assertEquals("Feil", $result);
        
    }
    
}
