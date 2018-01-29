<?php
include_once '../DAL/adminDatabase.php';
include_once '../DAL/adminDatabaseStub.php';
class Admin
{
    private $db;
    function __construct($innDb=null)
    {
        if($innDb==null)
        {
            $this->db=new AdminDB(); 
        }
        else
        {
            $this->db=$innDb;
        }
    }
    
    function hentAlleKunder()
    {
        $kunder= $this->db->hentAlleKunder();
        return $kunder;
    }
    
    //Maja
    function endreKundeInfo($kunde)
    {
        $OK= $this->db->endreKundeInfo($kunde);
        return $OK;
    }
    
    function registrerKunde($kunde)
    {
        $OK = $this->db->registrerKunde($kunde);
        return $OK;
    }
    
    function slettKunde($personnummer)
    {
        $OK = $this->db->slettKunde($personnummer);
        return $OK;
    }
    
    //Maja
    function registrerKonto($konto)
    {
        $OK = $this->db->registerKonto($konto);
        return $OK;
    }
    
    function endreKonto($konto)
    {
        $OK = $this->db->endreKonto($konto);
        return $OK;
    }
    function hentAlleKonti()
    {
        $konti = $this->db->hentAlleKonti();
        return $konti;
    }
    
    //Maja
    function slettKonto($kontonummer)
    {
        $OK = $this->db->slettKonto($kontonummer);
        return $OK;
    }
}