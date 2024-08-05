<?php 
if(!isset($_SESSION)) 
{session_start();}
if (empty($_SESSION['requestId'])){
$url = 'https://checkout-test.placetopay.com/api/session';

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
}
else {
    
    $url = 'https://checkout-test.placetopay.com/api/session/'.$_SESSION['requestId'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
}
?>