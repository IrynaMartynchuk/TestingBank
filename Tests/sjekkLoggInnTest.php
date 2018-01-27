<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

//!!!!!Not sure if I have to make a test for regex
class sjekkLoggInnTest extends PHPUnit\Framework\TestCase{
    
    public function testCorrectPPersonalNumber(){
        //Arrange
        $personnummer = "111111111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "OK"); 
    }

    public function testIncorrectPersonalNumber(){
        //Arrange
        $personnummer = "1111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "Feil i personnummer");  
    }
    
    public function testCorrectPassword(){
        //Arrange
        $personnummer = "111111111111";
        $password = "123456";
        $bank = new Bank(new BankDBStub());
        //Act
        $result = $bank->sjekkLoggInn($personnummer, $password);
        //Assert
        $this->assertEquals($result, "OK");
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
