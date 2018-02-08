<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {
        function hentEnKunde($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer =$personnummer;
           $enKunde->navn = "Per Olsen";
           $enKunde->adresse = "Osloveien 82, 0270 Oslo";
           $enKunde->telefonnr="12345678";
           return $enKunde;
        }
        function hentAlleKunder()
        {
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
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer="010101234567";
            $konto->kontonummer=$kontoNr;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato<=$tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
                        $konto->transaksjoner[]=$transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato='2015-03-27';
                        $transaksjon2->transaksjonBelop=-2056.45;
                        $transaksjon2->fraTilKontonummer="114342344556";
                        $transaksjon2->melding="Husleie";
                        $konto->transaksjoner[]=$transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop=1454.45;
                        $transaksjon3->fraTilKontonummer="114342344511";
                        $transaksjon3->melding="Lekeland";
                        $konto->transaksjoner[]=$transaksjon3;
                        break;
                }
                $dato +=(60*60*24); // en dag i tillegg i sekunder
            }
            return $konto;
        }
        
        function sjekkLoggInn($personnummer, $passord){
            $kunde = new kunde();
            $kunde->personnummer = "111111111111";
            $kunde->passord = "123456";
            
            if($personnummer == $kunde->personnummer && $passord == $kunde->passord){
                return "OK";
            } else {
                return "Feil";
            }    
        }
        
        function registrerBetaling($kontoNr, $transaksjon){
           
            if($kontoNr == "1234567890" && $transaksjon->melding == "message"){
                return "OK";
            }    
            else {
                return "Wrong!";
            }
        }
        
    function hentBetalinger($personnummer) {
        $konto=new konto();
        $konto->personnummer=01010122344;
        if($konto->personnummer==$personnummer) {
                $konto->transaksjoner=array();
                $transaction1 = new transaksjon();
                $transaction1->dato='2015-03-26';
                $transaction1->transaksjonBelop=134.4;
                $transaction1->fraTilKontonummer="22342344556";
                $transaction1->melding="Meny Holtet";
                $transaction1->avventer=0;
                $konto->transaksjoner[]=$transaction1;
                
                $transaction2 = new transaksjon();
                $transaction2->dato='2015-03-27';
                $transaction2->transaksjonBelop=-2056.45;
                $transaction2->fraTilKontonummer="114342344556";
                $transaction2->melding="Husleie";
                $transaction2->avventer=1; 
                $konto->transaksjoner[]=$transaction2;
                
                $betalinger=array();                
                foreach($konto->transaksjoner as $betaling){
                    $betalinger[]=$betaling;
                }
                return $betalinger;
        }
        else {
            $betalinger=array();
            $betalinger[]=" ";
            return $betalinger;
        }
    }

    function hentKonti($personnummer){
        $konti=array();
                $konto1 = new konto();
                $konto2 = new konto();
                $konto1->personnummer=01010110523;
                if ($personnummer == $konto1->personnummer){
                    $konto1->kontonummer=105010123456;
                    $konti[]= $konto1;
                    $konto2->kontonummer=105010123499;
                    $konti[]= $konto2;
                return $konti;
                }
                else {
                    $konti[]=" ";
                    return $konti;
                }
            }
        
        function hentSaldi($personnr){
            $konto = new konto();
            $konto->personnummer=01010122344;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if ($personnr == $konto->personnummer)
            return $konto->saldo;
            return "Mistake";
            }
        
        function utforBetaling($TxID){
            if($TxID == 7){
                return true;
            } else {
                return false;
            }
        }
        
        function endreKundeInfo($kunde){
            
            $kunde1 = new kunde();
            $kunde1->etternavn = "Kiszka";
            $kunde1->adresse = "Thereses Gate";
            
            if($kunde->etternavn == $kunde1->etternavn || $kunde->adresse == $kunde1->adresse){
                return "OK";
            }else {
                return "Wrong";
            }
        }
        
       function hentKundeInfo($personnummer){
        $kunde=new kunde(); 
        $kunde->personnummer=01010110523;
        if ($kunde->personnummer == $personnummer){
        $kunde->fornavn ='Maria';
        $kunde->etternavn ='Mikhaylova';
        $kunde->adresse = 'Ookern Torgvei 92';
        $kunde->postnr =1177;
        $kunde->telefonnr = 45654654;
        $kunde->passord ='HeiHei';
        $kunde->poststed='Oslo';
        return $kunde;
        }
        else{
            return "Feil";
        }
       } 

    }