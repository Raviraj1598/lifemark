<?php

function enc($data){
 $simple_string=$data;

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '955786NP76543211'; 
$encryption_key = "RVWGetLostHacker";
$encryption = openssl_encrypt($simple_string, $ciphering,
$encryption_key, $options, $encryption_iv);

return $encryption;
}

function dec($data){
$encryption=$data;
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$decryption_iv = '955786NP76543211';
$decryption_key = "RVWGetLostHacker";
$decryption=openssl_decrypt ($encryption, $ciphering, 
$decryption_key, $options, $decryption_iv);
return $decryption;
}

function getUser($uid)
{
     $link=  mysqli_connect(host, uname, pass, db);
    $data= new stdClass();
    
    $qry="select * from user_tb where u_id='$uid'";
    $rs= mysqli_query($link, $qry);
    while($rw= mysqli_fetch_assoc($rs))
    {
        $data -> id = $uid;
        $data -> name = $rw["u_name"];
        $data -> contact = $rw["u_contact"];
        $data -> email = $rw["u_email"];
        $data -> gender = $rw["u_gender"];
        $data -> dp = $rw["u_image"];
        $data -> status = $rw["u_status"];
        $data -> con = $rw["u_connects"];
        $data -> type = $rw["u_type"];
        $data -> des = $rw["u_des"];
        $data -> addr = $rw["u_address"];
        $data -> city = $rw["u_city"];
        $data -> bio = $rw["user_bio"];
        $data -> onfeed = $rw["onfeed"];
     }
    return $data;
}
function getSp($uid)
{
     $link=  mysqli_connect(host, uname, pass, db);
    $data= new stdClass();
    
    $qry="select * from serviceprovider_tb where sp_id='$uid'";
    $rs= mysqli_query($link, $qry);
    while($rw= mysqli_fetch_assoc($rs))
    {
        $data -> id = $uid;
        $data -> name = $rw["sp_name"];
        $data -> bio = $rw["bio"];
        $data -> shop_name = $rw["shop_name"];
        $data -> contact = $rw["sp_contact"];
        $data -> email = $rw["sp_email"];
        $data -> dp = $rw["shop_image"];
        $data -> status = $rw["sp_status"];
        $data -> addr = $rw["shop_address"];
        $data -> type = "Vendor";
    }
    return $data;
}
function getPass($uid)
{
     $link=  mysqli_connect(host, uname, pass, db);
    $pass= new stdClass();
    
    $qry="select * from serviceprovider_tb where sp_id='$uid'";
    $rs= mysqli_query($link, $qry);
    while($rw= mysqli_fetch_assoc($rs))
    {
        $pass -> id = $uid;
        $pass -> hash = $rw["hash"];
        $pass -> pp = $rw["sp_password"];
    }
    return $pass;
}

?>