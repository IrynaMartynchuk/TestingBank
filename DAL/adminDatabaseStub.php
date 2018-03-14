<?php
include_once '../Model/domeneModell.php';

class AdminDBStub {
    
    /**Maria**/
    function hentAlleKunder(){
        $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->navn = "Per Olsen";
           $kunde1->adresse = "Osloveien 82 0270 Oslo";
           $kunde1->telefonnr="12345678";
           $alleKunder[]=$kunde1;
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->navn = "Line Jensen";
           $kunde2->adresse = "Askerveien 100, 1379 Asker";
           $kunde2->telefonnr="92876789";
           $alleKunder[]=$kunde2;
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->navn = "Ole Olsen";
           $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
           $kunde3->telefonnr="99889988";
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
            return "Wrong";
          }
    }
    
    //Maja
    function registerKonto($konto) {
        
            $kunde = new kunde();
            $kunde->personnummer = "11111111111";
            
            if($kunde->personnummer == $konto->personnummer) {
                return "OK";
            } else {
                return "Wrong!";
            }
    }
    
    /**Maria**/
    function hentAlleKonti() {
        $konti=array();
        $konto1=new konto();
        $konto1->personnummer=12345678901;
        $konto1->kontonummer=010101234567;
        $konto1->type="Sparekonto";
        $konto1->saldo =2300.34;
        $konto1->valuta="NOK";
        $konti[]=$konto1;
      //  $konto1->$transaksjoner = array();
        
        $konto2=new konto();
        $konto2->personnummer=010101234567;
        $konto2->kontonummer=010101234567;
        $konto2->type="Sparekonto";
        $konto2->saldo =2300.34;
        $konto2->valuta="NOK";
        //  $konto1->$transaksjoner = array();
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
            return "Wrong!";
        }
    }
     
}
