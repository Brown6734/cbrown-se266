<?php 

//this file will handle any GET or POST activity

require_once './account.php';

function getCheckBal(){
    //$checking = new CheckingAccount ('C123', $_POST['checkingBalance'], '12-20-2019');
    $checkBal = $this->balance;
    return $checkBal;
}

?>