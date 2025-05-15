<?php

include '../../include/confing.php';
include '../session.php';
include '../functions.php';
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	
                $order_id=$_POST["ORDERID"];
                $txnid=$_POST["TXNID"];
                $date=$_POST["TXNDATE"];
                $uid=$_REQUEST["uid"];
                $_SESSION["uid"] = $uid; 
                $amt=$_POST["TXNAMOUNT"];
                if($amt=="3000")
                {
                    $pack="pro";
                    echo $qry="insert into transactions (u_id,status,od_id,tx_id,pack,date) values ('$uid','Success','$order_id','$txnid','$pack','$date')";
                    echo $qry1="update user_tb set u_type='pro' where u_id='$uid'";
                }
                else if($amt=="200")
                { 
                    $pack="20";
                    echo $qry="insert into transactions (u_id,status,od_id,tx_id,pack,date) values ('$uid','Success','$order_id','$txnid','$pack','$date')";
                    echo $qry1="update user_tb set u_connects=u_connects+20";
                    
                }
                
                 mysqli_query($link, $qry);
                mysqli_query($link, $qry1);
                
                if($pack=="pro")
                {
                header('location:../index.php?status='.$pack);
                }
                else
                {
                    header('location:../UpgradePro.php?status='.$pack);
                }
                exit();
                
        }
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
              
                 $uid=$_REQUEST["uid"];
                  $_SESSION["uid"] = $uid; 
                 
                $qry="insert into transactions (u_id,status,od_id,tx_id,date,pack) values ('$uid','Failed','$order_id','00','$date','0')";
                mysqli_query($link, $qry);
                
               header('location:../UpgradePro.php?status=failed');
                exit();
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>