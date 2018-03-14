<?php
include_once '../Model/domeneModell.php';

class AdminDBStub {
    
    /**Maria**/
    function hentAlleKunder(){
        $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->fornavn = "Per";
           $kunde1->etternavn = "Olsen";
           $kunde1->postnr=1234;
           $kunde1->poststed="Asker";
           $kunde1->adresse = "Osloveien 82";
           $kunde1->telefonnr="12345678";
           $kunde1->passord="HeiHeiHei";
           $alleKunder[]=$kunde1;
           
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122355";
           $kunde2->fornavn = "Line";
           $kunde2->etternavn = "Jensen";
           $kunde2->adresse = "Askerveien 10";
           $kunde2->postnr=4321;
           $kunde2->poststed="Oslo";
           $kunde2->telefonnr="92876789";
           $kunde2->passord="HeiHei2";
           $alleKunder[]=$kunde2;
           
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233466";
           $kunde3->fornavn = "Ole";
           $kunde3->etternavn = "Olsen";
           $kunde3->adresse = "Bærumsveien 23";
           $kunde3->postnr=2023;
           $kunde3->poststed="Oslo";
           $kunde3->telefonnr="99889988";
           $kunde3->passord="Hei2";
           $alleKunder[]=$kunde3;
           return $alleKunder;
    }
    
    function registrerKunde($kunde){
        if($kunde->personnummer == "20108824000"){
            return "OK";
        } 
        else {
            return "Feil";
        }
    }
    
    /**Maria**/
    function slettKunde($personnummer){
        $kunde= new kunde();
        $kunde->personnummer=12345678901;
        if($personnummer==$kunde->personnummer){
            return 'OK';
        }
        else {
            return 'Feil';
        }
    }
        
        function endreKonto($konto){
            if($konto->personnummer==90){
                return "Feil";
            } else {
                return "OK";
            }
        }
    
    //Maja
    function endreKundeInfo($kunde){
        
        $kunde1 = new kunde();
        $kunde1->etternavn = "Kiszka";
        $kunde1->adresse = "Thereses Gate";
            
        if($kunde1->etternavn == $kunde->etternavn || $kunde1->adresse == $kunde->adresse){
            return "OK";
          }else {
            return "Feil";
          }
    }
    
    //Maja
    function registerKonto($konto) {
        
            $kunde = new kunde();
            $kunde->personnummer = "11111111111";
            
            if($kunde->personnummer == $konto->personnummer) {
                return "OK";
            } else {
                return "Feil";
            }
    }
    
    /**Maria**/
    function hentAlleKonti() {
        $konti=array();
        $konto1=new konto();
        $konto1->personnummer=12345678901;
        $konto1->kontonummer=123123123;
        $konto1->type="Lonnskonto";
        $konto1->saldo =2300.34;
        $konto1->valuta="NOK";
        $konti[]=$konto1;
        
        $konto2=new konto();
        $konto2->personnummer=12345678901;
        $konto2->kontonummer=123123333;
        $konto2->type="Sparekonto";
        $konto2->saldo =230000.00;
        $konto2->valuta="NOK";
        $konti[]=$konto2;
        return $konti;
    }
     
    //Maja
    function slettKonto($kontonummer){
        
        $konto = new konto();
        $konto->kontonummer = "1234567890";
        
        if($konto->kontonummer == $kontonummer){
            return "OK";
        }else {
            return "Feil";
        }
    }
     
}
