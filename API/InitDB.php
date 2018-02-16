<?php
header('Content-Type: application/json');
$OK = true;
$db = new mysqli("localhost", "root","root","bank");
if($db->connect_error)
{
   $OK=false;
}
$fil= file_get_contents('InitDB.sql');

$res = $db->multi_query($fil);
$db->close();
if(!$res)
{
    $OK=false;
}
if($OK)
{
    echo json_encode("OK");
}
else
{
    echo json_encode("Feil");
} 

