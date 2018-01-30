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
        }
