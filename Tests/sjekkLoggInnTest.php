<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

//!!!!!Not sure if I have to make a test for regex
class sjekkLoggInnTest extends PHPUnit_Framework_TestCase{
    
    public function testCorrectPNumberCorrectPass(){
        //Arrange
        $personnummer = "111111111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "OK"); 
    }

    public function testPNumberTooShort(){
        //Arrange
        $personnummer = "1111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil i personnummer");  
    }

    public function testPNumberTooLong(){
        //Arrange
        $personnummer = "1111111111111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil");  
    }
    
    public function testLettersInPNr(){
        //Arrange
        $personnummer = "1111111111a";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil i personnummer");  
    }
    
    public function testWrongPassword(){
        //Arrange
        $personnummer = "111111111111";
        $password = "1476";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil i passord");
    }
    
    public function NoPassword(){
        //Arrange
        $personnummer = "111111111111";
        $password = "";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil i passord");
    }
}
