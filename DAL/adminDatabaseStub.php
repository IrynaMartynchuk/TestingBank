<?php
include_once '../Model/domeneModell.php';

class AdminDBStub {
    
    function registrerKunde($kunde){
        if($kunde->personnummer == "20108824000"){
            return true;
        } 
        else {
            return false;
        }
    }
        
        function endreKonto($konto){
            if($konto->kontonummer == 105010123456){
                return true;
            } else {
                return false;
            }
        }
    
    
    function endreKundeInfo($kunde){
        
        $kunde1 = new kunde();
        $kunde1->etternavn = "Kiszka";
        $kunde1->adresse = "Thereses Gate";
            
        if($kunde1->etternavn == $kunde->etternavn || $kunde1->adresse == $kunde->adresse){
            return "OK";
          }else {
            return "Wrong";
          }
    }
}